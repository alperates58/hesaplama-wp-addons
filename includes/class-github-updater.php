<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HC_Github_Updater {

    private $option_key            = 'hc_github_settings';
    private $notice_transient_key  = 'hc_github_update_notice';
    private $debug_option_key      = 'hc_github_update_last_debug';
    private $error_option_key      = 'hc_github_update_last_error';
    private $last_zip_http_code    = 0;

    public function __construct() {
        add_action( 'admin_post_hc_update_from_github', [ $this, 'handle_update' ] );
        add_action( 'wp_ajax_hc_check_github_version',  [ $this, 'ajax_check_version' ] );
    }

    public function get_settings() {
        return wp_parse_args( get_option( $this->option_key, [] ), [
            'repo'   => '',
            'branch' => 'main',
            'token'  => '',
        ] );
    }

    public function save_settings( $data ) {
        update_option( $this->option_key, [
            'repo'   => $this->sanitize_repo( $data['repo'] ?? '' ),
            'branch' => sanitize_text_field( $data['branch'] ?? 'main' ),
            'token'  => sanitize_text_field( $data['token'] ?? '' ),
        ] );
    }

    public function get_remote_version() {
        $s = $this->get_settings();

        if ( empty( $s['repo'] ) ) {
            return new WP_Error( 'missing_repo', 'GitHub repo ayarı eksik.' );
        }

        if ( ! $this->is_valid_repo( $s['repo'] ) ) {
            return new WP_Error( 'invalid_repo', 'GitHub repo formatı geçersiz. Örnek: kullanici/repo' );
        }

        $url  = "https://api.github.com/repos/{$s['repo']}/commits/{$s['branch']}";
        $args = [
            'timeout' => 20,
            'headers' => [
                'Accept'     => 'application/vnd.github+json',
                'User-Agent' => 'hesaplama-suite',
            ],
        ];

        if ( $s['token'] ) {
            $args['headers']['Authorization'] = 'token ' . $s['token'];
        }

        $resp = wp_remote_get( $url, $args );
        if ( is_wp_error( $resp ) ) {
            return new WP_Error( 'github_request_failed', 'GitHub bağlantısı kurulamadı: ' . $resp->get_error_message() );
        }

        $code = wp_remote_retrieve_response_code( $resp );
        $body = json_decode( wp_remote_retrieve_body( $resp ), true );

        if ( $code < 200 || $code >= 300 ) {
            $message = is_array( $body ) && ! empty( $body['message'] ) ? $body['message'] : 'GitHub API yanıtı başarısız.';
            return new WP_Error( 'github_api_error', 'GitHub sürüm bilgisi alınamadı: ' . $message );
        }

        if ( empty( $body['sha'] ) ) {
            return new WP_Error( 'github_bad_response', 'GitHub sürüm yanıtı beklenen formatta değil.' );
        }

        return $body['sha'];
    }

    public function handle_update() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'GitHub güncellemesi yapma yetkiniz yok.', 'hesaplama-suite' ), esc_html__( 'Yetkisiz işlem', 'hesaplama-suite' ), [ 'response' => 403 ] );
        }

        if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ), 'hc_update_from_github' ) ) {
            wp_die( esc_html__( 'Güvenlik doğrulaması başarısız oldu. Lütfen sayfayı yenileyip tekrar deneyin.', 'hesaplama-suite' ), esc_html__( 'Geçersiz istek', 'hesaplama-suite' ), [ 'response' => 400 ] );
        }

        $this->reset_update_state();

        $s      = $this->get_settings();
        $result = $this->download_and_install( $s );

        if ( true === $result ) {
            $this->set_update_notice( 'success', 'Eklenti GitHub üzerinden başarıyla güncellendi.' );
            wp_safe_redirect( admin_url( 'admin.php?page=hesaplama-suite&tab=github&update=success' ) );
            exit;
        }

        $message = $result instanceof WP_Error ? $result->get_error_message() : (string) $result;
        $this->save_update_error( $message );
        $this->set_update_notice( 'error', $message );

        wp_safe_redirect( admin_url( 'admin.php?page=hesaplama-suite&tab=github&update=error' ) );
        exit;
    }

    public function ajax_check_version() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'GitHub sürüm kontrolü yapma yetkiniz yok.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_send_json_error( 'Güvenlik doğrulaması başarısız oldu. Lütfen sayfayı yenileyip tekrar deneyin.', 400 );
        }

        $sha = $this->get_remote_version();

        if ( is_wp_error( $sha ) ) {
            wp_send_json_error( $sha->get_error_message(), 200 );
        }

        wp_send_json_success( [ 'sha' => substr( $sha, 0, 7 ) ] );
    }

    public function get_update_notice( $delete = true ) {
        $notice = get_transient( $this->notice_transient_key );

        if ( $delete ) {
            delete_transient( $this->notice_transient_key );
        }

        return is_array( $notice ) ? $notice : null;
    }

    public function get_last_update_error() {
        return get_option( $this->error_option_key, '' );
    }

    public function get_last_update_debug() {
        return get_option( $this->debug_option_key, [] );
    }

    private function download_and_install( $s ) {
        if ( empty( $s['repo'] ) ) {
            return new WP_Error( 'missing_repo', 'GitHub repo ayarı eksik.' );
        }

        if ( ! $this->is_valid_repo( $s['repo'] ) ) {
            return new WP_Error( 'invalid_repo', 'GitHub repo formatı geçersiz. Örnek: kullanici/repo' );
        }

        if ( ! function_exists( 'download_url' ) || ! function_exists( 'unzip_file' ) || ! function_exists( 'copy_dir' ) ) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }

        $zip_url = "https://github.com/{$s['repo']}/archive/refs/heads/{$s['branch']}.zip";
        $args    = [
            'timeout' => 60,
            'headers' => [
                'Accept'     => 'application/vnd.github+json',
                'User-Agent' => 'hesaplama-suite',
            ],
        ];

        if ( $s['token'] ) {
            $args['headers']['Authorization'] = 'token ' . $s['token'];
        }

        $plugin_base       = dirname( HC_PLUGIN_DIR );
        $dest              = HC_PLUGIN_DIR;
        $filesystem_method = function_exists( 'get_filesystem_method' ) ? get_filesystem_method() : 'unknown';

        $this->log_update_debug(
            [
                'repo'              => $s['repo'],
                'branch'            => $s['branch'],
                'zip_url'           => $zip_url,
                'filesystem_method' => $filesystem_method,
                'dest_writable'     => is_writable( $dest ) ? 'yes' : 'no',
                'plugin_base'       => $plugin_base,
            ]
        );

        $tmp = $this->download_zip( $zip_url, $args );
        $this->log_update_debug(
            [
                'tmp_created'       => ! is_wp_error( $tmp ) && ! empty( $tmp ) ? 'yes' : 'no',
                'zip_download_http' => (string) $this->last_zip_http_code,
            ]
        );

        if ( is_wp_error( $tmp ) ) {
            return $tmp;
        }

        global $wp_filesystem;
        WP_Filesystem();

        $this->log_update_debug(
            [
                'wp_filesystem_class' => is_object( $wp_filesystem ) ? get_class( $wp_filesystem ) : 'unavailable',
            ]
        );

        $unzip = unzip_file( $tmp, $plugin_base );
        @unlink( $tmp );

        $this->log_update_debug( [ 'unzip_result' => is_wp_error( $unzip ) ? $unzip->get_error_code() : 'success' ] );

        if ( is_wp_error( $unzip ) ) {
            return $this->wrap_error( 'github_unzip_failed', 'ZIP arşivi açılamadı: ' . $unzip->get_error_message() );
        }

        $repo_name     = basename( $s['repo'] );
        $extracted_dir = $plugin_base . '/' . $repo_name . '-' . $s['branch'];
        $package_root  = $this->locate_package_root( $extracted_dir );

        $this->log_update_debug(
            [
                'extracted_dir'        => $extracted_dir,
                'extracted_dir_exists' => is_dir( $extracted_dir ) ? 'yes' : 'no',
                'package_root'         => $package_root ? $package_root : '',
            ]
        );

        if ( ! is_dir( $extracted_dir ) ) {
            return $this->wrap_error( 'github_extracted_dir_missing', 'İndirilen paket açılamadı veya beklenen klasör bulunamadı.' );
        }

        if ( ! $package_root ) {
            $this->cleanup_directory( $extracted_dir );
            return $this->wrap_error( 'github_package_root_missing', 'İndirilen pakette eklenti kökü bulunamadı. ZIP içeriğinde hesaplama-suite.php ve modules dizini doğrulanamadı.' );
        }

        $validation = $this->prepare_extracted_modules_for_install( $package_root );
        $this->log_update_debug( [ 'validation_result' => is_wp_error( $validation ) ? $validation->get_error_code() : 'success' ] );

        if ( is_wp_error( $validation ) ) {
            $this->cleanup_directory( $extracted_dir );
            return $validation;
        }

        $copied = copy_dir( $package_root, $dest );
        $this->log_update_debug( [ 'copy_dir_result' => is_wp_error( $copied ) ? $copied->get_error_code() : 'success' ] );

        if ( is_wp_error( $copied ) && $this->should_use_native_copy_fallback( $filesystem_method, $dest ) ) {
            $copied = $this->native_recursive_copy( $package_root, $dest );
            $this->log_update_debug( [ 'native_copy_fallback' => is_wp_error( $copied ) ? $copied->get_error_code() : 'success' ] );
        }

        $this->cleanup_directory( $extracted_dir );

        if ( is_wp_error( $copied ) ) {
            return $this->wrap_error( 'github_copy_failed', 'Yeni eklenti dosyaları kopyalanamadı: ' . $copied->get_error_message() );
        }

        $remote_sha = $this->get_remote_version();

        update_option( 'hc_last_update', current_time( 'mysql' ) );
        update_option( 'hc_last_update_version', (string) time() );

        if ( $remote_sha && ! is_wp_error( $remote_sha ) ) {
            update_option( 'hc_last_update_sha', $remote_sha );
        }

        if ( class_exists( 'HC_Module_Inventory' ) ) {
            HC_Module_Inventory::invalidate_caches();
        }

        if ( function_exists( 'wp_clean_plugins_cache' ) ) {
            wp_clean_plugins_cache( true );
        }
        if ( function_exists( 'wp_cache_flush' ) ) {
            wp_cache_flush();
        }
        if ( function_exists( 'opcache_reset' ) ) {
            @opcache_reset();
        }

        return true;
    }

    private function sanitize_repo( $repo ) {
        $repo = sanitize_text_field( wp_unslash( $repo ) );
        $repo = trim( $repo, " \t\n\r\0\x0B/" );

        return $repo;
    }

    private function download_zip( $url, $args ) {
        $tmp = wp_tempnam( $url );

        if ( ! $tmp ) {
            return new WP_Error( 'tmp_file_failed', 'Geçici indirme dosyası oluşturulamadı.' );
        }

        $args['stream']   = true;
        $args['filename'] = $tmp;

        $resp = wp_remote_get( $url, $args );

        if ( is_wp_error( $resp ) ) {
            $this->last_zip_http_code = 0;
            @unlink( $tmp );
            return $resp;
        }

        $code = wp_remote_retrieve_response_code( $resp );
        $this->last_zip_http_code = (int) $code;

        if ( $code < 200 || $code >= 300 ) {
            @unlink( $tmp );
            return new WP_Error( 'github_zip_download_failed', 'GitHub ZIP indirilemedi. HTTP ' . $code . '. Repo, branch veya token ayarlarını kontrol edin.' );
        }

        return $tmp;
    }

    private function is_valid_repo( $repo ) {
        return (bool) preg_match( '/^[A-Za-z0-9_.-]+\/[A-Za-z0-9_.-]+$/', $repo );
    }

    private function prepare_extracted_modules_for_install( $extracted_dir ) {
        $modules_dir = trailingslashit( $extracted_dir ) . 'modules';

        if ( ! is_dir( $modules_dir ) ) {
            return true;
        }

        $slug_map   = [];
        $render_map = [];
        $duplicates = [];

        foreach ( glob( trailingslashit( $modules_dir ) . '*', GLOB_ONLYDIR ) as $module_path ) {
            $slug        = basename( $module_path );
            $module_file = trailingslashit( $module_path ) . 'calculator.php';

            if ( $this->should_skip_module_directory( $slug ) ) {
                $this->cleanup_directory( $module_path );
                continue;
            }

            $normalized_slug = $this->normalize_module_key( $slug );
            $render_name     = $this->extract_render_function_name( $module_file );

            if ( isset( $slug_map[ $normalized_slug ] ) ) {
                $duplicates[] = sprintf( '%s (duplicate slug of %s)', $slug, $slug_map[ $normalized_slug ] );
                continue;
            }

            if ( $render_name && isset( $render_map[ $render_name ] ) ) {
                $duplicates[] = sprintf( '%s (duplicate render function %s with %s)', $slug, $render_name, $render_map[ $render_name ] );
                continue;
            }

            $slug_map[ $normalized_slug ] = $slug;
            if ( $render_name ) {
                $render_map[ $render_name ] = $slug;
            }
        }

        if ( empty( $duplicates ) ) {
            return true;
        }

        $this->log_update_debug( [ 'duplicate_modules' => $duplicates ] );

        return new WP_Error(
            'hc_duplicate_modules_detected',
            'GitHub update durduruldu. Duplicate modüller bulundu: ' . implode( '; ', $duplicates )
        );
    }

    private function normalize_module_key( $slug ) {
        $slug = remove_accents( wp_strip_all_tags( (string) $slug ) );
        $slug = function_exists( 'mb_strtolower' ) ? mb_strtolower( $slug, 'UTF-8' ) : strtolower( $slug );
        $slug = str_replace( [ '_', '-' ], ' ', $slug );
        $slug = preg_replace( '/[^\p{L}\p{N}]+/u', ' ', $slug );

        return trim( preg_replace( '/\s+/', ' ', $slug ) );
    }

    private function should_skip_module_directory( $slug ) {
        $slug = function_exists( 'mb_strtolower' ) ? mb_strtolower( (string) $slug, 'UTF-8' ) : strtolower( (string) $slug );

        return false !== strpos( $slug, '.disabled' ) || false !== strpos( $slug, '.off' );
    }

    private function extract_render_function_name( $file ) {
        if ( ! file_exists( $file ) ) {
            return '';
        }

        $contents = file_get_contents( $file );
        if ( false === $contents ) {
            return '';
        }

        if ( ! preg_match( '/function\s+(hc_render_[a-z0-9_]+)\s*\(/i', $contents, $matches ) ) {
            return '';
        }

        return strtolower( $matches[1] );
    }

    private function locate_package_root( $extracted_dir ) {
        $required_file = trailingslashit( $extracted_dir ) . 'hesaplama-suite.php';
        $modules_dir   = trailingslashit( $extracted_dir ) . 'modules';

        if ( is_file( $required_file ) && is_dir( $modules_dir ) ) {
            return $extracted_dir;
        }

        foreach ( glob( trailingslashit( $extracted_dir ) . '*', GLOB_ONLYDIR ) as $candidate ) {
            if (
                is_file( trailingslashit( $candidate ) . 'hesaplama-suite.php' ) &&
                is_dir( trailingslashit( $candidate ) . 'modules' )
            ) {
                return $candidate;
            }
        }

        return '';
    }

    private function should_use_native_copy_fallback( $filesystem_method, $dest ) {
        return 'ftpsockets' === $filesystem_method && is_dir( $dest ) && is_writable( $dest );
    }

    private function native_recursive_copy( $source, $destination ) {
        if ( ! is_dir( $source ) ) {
            return new WP_Error( 'native_copy_source_missing', 'Kopyalama kaynağı bulunamadı.' );
        }

        if ( ! is_dir( $destination ) || ! is_writable( $destination ) ) {
            return new WP_Error( 'native_copy_destination_unwritable', 'Hedef eklenti klasörü PHP tarafından yazılabilir değil.' );
        }

        $items = scandir( $source );
        if ( false === $items ) {
            return new WP_Error( 'native_copy_scandir_failed', 'Kaynak klasör okunamadı.' );
        }

        foreach ( $items as $item ) {
            if ( '.' === $item || '..' === $item ) {
                continue;
            }

            $from = trailingslashit( $source ) . $item;
            $to   = trailingslashit( $destination ) . $item;

            if ( is_dir( $from ) ) {
                if ( ! is_dir( $to ) && ! wp_mkdir_p( $to ) ) {
                    return new WP_Error( 'native_copy_mkdir_failed', 'Hedef klasör oluşturulamadı: ' . $item );
                }

                $copied = $this->native_recursive_copy( $from, $to );
                if ( is_wp_error( $copied ) ) {
                    return $copied;
                }

                continue;
            }

            if ( ! @copy( $from, $to ) ) {
                return new WP_Error( 'native_copy_file_failed', 'Dosya kopyalanamadı: ' . $item );
            }
        }

        return true;
    }

    private function cleanup_directory( $path ) {
        global $wp_filesystem;

        if ( is_object( $wp_filesystem ) && method_exists( $wp_filesystem, 'delete' ) ) {
            $deleted = $wp_filesystem->delete( $path, true );
            if ( $deleted ) {
                return true;
            }
        }

        return $this->native_recursive_delete( $path );
    }

    private function native_recursive_delete( $path ) {
        if ( ! file_exists( $path ) ) {
            return true;
        }

        if ( is_file( $path ) || is_link( $path ) ) {
            return @unlink( $path );
        }

        $items = scandir( $path );
        if ( false === $items ) {
            return false;
        }

        foreach ( $items as $item ) {
            if ( '.' === $item || '..' === $item ) {
                continue;
            }

            if ( ! $this->native_recursive_delete( trailingslashit( $path ) . $item ) ) {
                return false;
            }
        }

        return @rmdir( $path );
    }

    private function reset_update_state() {
        delete_transient( $this->notice_transient_key );
        delete_option( $this->debug_option_key );
        delete_option( $this->error_option_key );
        $this->last_zip_http_code = 0;
    }

    private function set_update_notice( $type, $message ) {
        set_transient(
            $this->notice_transient_key,
            [
                'type'    => $type,
                'message' => wp_strip_all_tags( (string) $message ),
                'time'    => current_time( 'mysql' ),
            ],
            10 * MINUTE_IN_SECONDS
        );
    }

    private function save_update_error( $message ) {
        update_option( $this->error_option_key, wp_strip_all_tags( (string) $message ), false );
    }

    private function log_update_debug( $data ) {
        $debug = get_option( $this->debug_option_key, [] );

        if ( ! is_array( $debug ) ) {
            $debug = [];
        }

        foreach ( (array) $data as $key => $value ) {
            $debug[ $key ] = is_scalar( $value ) ? (string) $value : wp_json_encode( $value );
        }

        update_option( $this->debug_option_key, $debug, false );
        error_log( 'HC_Github_Updater: ' . wp_json_encode( $debug ) );
    }

    private function wrap_error( $code, $message ) {
        $sanitized = wp_strip_all_tags( (string) $message );
        $this->save_update_error( $sanitized );

        return new WP_Error( $code, $sanitized );
    }
}
