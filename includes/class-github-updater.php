<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HC_Github_Updater {

    private $option_key = 'hc_github_settings';

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

        $s      = $this->get_settings();
        $result = $this->download_and_install( $s );

        $status = true === $result ? 'success' : urlencode( $result );
        wp_safe_redirect( admin_url( 'admin.php?page=hesaplama-suite&tab=github&update=' . $status ) );
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

    private function download_and_install( $s ) {
        if ( empty( $s['repo'] ) ) return 'GitHub repo ayarı eksik.';
        if ( ! $this->is_valid_repo( $s['repo'] ) ) return 'GitHub repo formatı geçersiz. Örnek: kullanici/repo';

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

        $tmp = $this->download_zip( $zip_url, $args );
        if ( is_wp_error( $tmp ) ) return $tmp->get_error_message();

        $plugin_base = dirname( HC_PLUGIN_DIR );
        $dest        = HC_PLUGIN_DIR;

        global $wp_filesystem;
        WP_Filesystem();

        $unzip = unzip_file( $tmp, $plugin_base );
        @unlink( $tmp );

        if ( is_wp_error( $unzip ) ) return $unzip->get_error_message();

        $repo_name     = basename( $s['repo'] );
        $extracted_dir = $plugin_base . '/' . $repo_name . '-' . $s['branch'];

        if ( ! is_dir( $extracted_dir ) ) {
            return 'İndirilen paket açılamadı veya beklenen klasör bulunamadı.';
        }

        $copied = copy_dir( $extracted_dir, $dest );
        $wp_filesystem->delete( $extracted_dir, true );

        if ( is_wp_error( $copied ) ) {
            return 'Yeni eklenti dosyaları kopyalanamadı: ' . $copied->get_error_message();
        }

        $remote_sha = $this->get_remote_version();

        update_option( 'hc_last_update', current_time( 'mysql' ) );
        update_option( 'hc_last_update_version', (string) time() );

        if ( $remote_sha && ! is_wp_error( $remote_sha ) ) {
            update_option( 'hc_last_update_sha', $remote_sha );
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
            @unlink( $tmp );
            return $resp;
        }

        $code = wp_remote_retrieve_response_code( $resp );

        if ( $code < 200 || $code >= 300 ) {
            @unlink( $tmp );
            return new WP_Error( 'github_zip_download_failed', 'GitHub ZIP indirilemedi. HTTP ' . $code . '. Repo, branch veya token ayarlarını kontrol edin.' );
        }

        return $tmp;
    }

    private function is_valid_repo( $repo ) {
        return (bool) preg_match( '/^[A-Za-z0-9_.-]+\/[A-Za-z0-9_.-]+$/', $repo );
    }
}
