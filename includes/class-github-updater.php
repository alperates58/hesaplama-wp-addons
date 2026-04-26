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
            'repo'   => '',   // örn: kullanici/hesaplama-wp-addons
            'branch' => 'main',
            'token'  => '',   // private repo için, boş bırakılabilir
        ] );
    }

    public function save_settings( $data ) {
        update_option( $this->option_key, [
            'repo'   => sanitize_text_field( $data['repo'] ?? '' ),
            'branch' => sanitize_text_field( $data['branch'] ?? 'main' ),
            'token'  => sanitize_text_field( $data['token'] ?? '' ),
        ] );
    }

    /* GitHub'daki son commit SHA'sını getirir */
    public function get_remote_version() {
        $s = $this->get_settings();
        if ( empty( $s['repo'] ) ) return null;

        $url  = "https://api.github.com/repos/{$s['repo']}/commits/{$s['branch']}";
        $args = [ 'headers' => [ 'User-Agent' => 'hesaplama-suite' ] ];
        if ( $s['token'] ) {
            $args['headers']['Authorization'] = 'token ' . $s['token'];
        }

        $resp = wp_remote_get( $url, $args );
        if ( is_wp_error( $resp ) ) return null;

        $body = json_decode( wp_remote_retrieve_body( $resp ), true );
        return $body['sha'] ?? null;
    }

    /* Güncellemeyi indir ve plugin dizinine çıkart */
    public function handle_update() {
        if ( ! current_user_can( 'manage_options' ) ) wp_die( 'Yetkisiz.' );
        check_admin_referer( 'hc_update_from_github' );

        $s      = $this->get_settings();
        $result = $this->download_and_install( $s );

        $status = $result === true ? 'success' : urlencode( $result );
        wp_redirect( admin_url( 'admin.php?page=hesaplama-suite&tab=github&update=' . $status ) );
        exit;
    }

    public function ajax_check_version() {
        check_ajax_referer( 'hc_ajax_nonce', 'nonce' );
        $sha = $this->get_remote_version();
        wp_send_json_success( [ 'sha' => $sha ? substr( $sha, 0, 7 ) : null ] );
    }

    private function download_and_install( $s ) {
        if ( empty( $s['repo'] ) ) return 'Repo ayarı eksik.';

        $zip_url = "https://github.com/{$s['repo']}/archive/refs/heads/{$s['branch']}.zip";
        $args    = [ 'timeout' => 60, 'headers' => [ 'User-Agent' => 'hesaplama-suite' ] ];
        if ( $s['token'] ) {
            $args['headers']['Authorization'] = 'token ' . $s['token'];
        }

        // ZIP'i geçici dosyaya indir
        $tmp = download_url( $zip_url );  // WP built-in
        if ( is_wp_error( $tmp ) ) return $tmp->get_error_message();

        // Plugin klasörünün bir üstü (wp-content/plugins/)
        $plugin_base = dirname( HC_PLUGIN_DIR );
        $dest        = HC_PLUGIN_DIR;

        global $wp_filesystem;
        WP_Filesystem();

        // ZIP'i çıkart
        $unzip = unzip_file( $tmp, $plugin_base );
        @unlink( $tmp );

        if ( is_wp_error( $unzip ) ) return $unzip->get_error_message();

        // GitHub ZIP'i repo-branch/ klasörüne çıkarır, doğru isimle taşı
        $extracted_dir = $plugin_base . '/' . str_replace( '/', '-', $s['repo'] ) . '-' . $s['branch'];
        $plugin_slug   = basename( $dest );

        if ( is_dir( $extracted_dir ) ) {
            // Mevcut klasörü sil ve yenisiyle değiştir
            $wp_filesystem->delete( $dest, true );
            rename( $extracted_dir, $dest );
        }

        // Güncelleme zamanını kaydet
        update_option( 'hc_last_update', current_time( 'mysql' ) );
        return true;
    }
}
