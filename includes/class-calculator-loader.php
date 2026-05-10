<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HC_Calculator_Loader {

    public function __construct() {
        add_action( 'init',          [ $this, 'register_shortcodes' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
    }

    public function register_shortcodes() {
        // modules/ klasöründeki her alt klasör bir hesap makinesidir
        $modules_dir = HC_PLUGIN_DIR . 'modules/';
        if ( ! is_dir( $modules_dir ) ) return;

        $loaded_module_keys  = [];
        $loaded_render_names = [];

        foreach ( glob( $modules_dir . '*', GLOB_ONLYDIR ) as $module_path ) {
            if ( $this->should_skip_module_directory( $module_path ) ) {
                continue;
            }

            $slug           = basename( $module_path );
            $normalized_key = $this->normalize_module_key( $slug );
            $file           = $module_path . '/calculator.php';
            $render_name    = $this->extract_render_function_name( $file );

            if ( isset( $loaded_module_keys[ $normalized_key ] ) ) {
                error_log( sprintf( 'HC duplicate module skipped: %s (duplicate of %s)', $slug, $loaded_module_keys[ $normalized_key ] ) );
                continue;
            }

            if ( $render_name && isset( $loaded_render_names[ $render_name ] ) ) {
                error_log( sprintf( 'HC duplicate render function skipped: %s (%s already provided by %s)', $slug, $render_name, $loaded_render_names[ $render_name ] ) );
                continue;
            }

            if ( file_exists( $file ) ) {
                // Güvenlik kontrolü: Dosya <?php içeriyor mu? (Yapay zeka hatalı ham metin yazarsa siteyi bozmasın)
                $first_bytes = file_get_contents( $file, false, null, 0, 100 );
                if ( false !== strpos( $first_bytes, '<?php' ) ) {
                    $loaded_module_keys[ $normalized_key ] = $slug;
                    if ( $render_name ) {
                        $loaded_render_names[ $render_name ] = $slug;
                    }
                    require_once $file;
                    add_shortcode( 'hc_' . str_replace( '-', '_', $slug ), [ $this, 'render_shortcode' ] );
                }
            }
        }
    }

    public function render_shortcode( $atts, $content, $tag ) {
        // [hc_kilo_kaybi] → modules/kilo-kaybi/calculator.php içindeki render fonksiyonu
        $slug     = str_replace( [ 'hc_', '_' ], [ '', '-' ], $tag );
        $function = 'hc_render_' . str_replace( '-', '_', $slug );
        if ( function_exists( $function ) ) {
            ob_start();
            $result = $function( $atts );
            $output = ob_get_clean();

            if ( is_string( $result ) && '' !== $result ) {
                return $output . $result;
            }

            return $output;
        }
        return '<!-- Hesap makinesi bulunamadı: ' . esc_html( $slug ) . ' -->';
    }

    public function enqueue_assets() {
        global $post;
        if ( ! $post ) return;

        // Sadece shortcode kullanan sayfalarda yükle
        if ( has_shortcode( $post->post_content, 'hc_' ) || $this->page_has_hc_shortcode( $post->post_content ) ) {
            wp_enqueue_style(
                'hesaplama-suite',
                HC_PLUGIN_URL . 'assets/style.css',
                [],
                HC_VERSION
            );
            wp_enqueue_script(
                'hesaplama-suite',
                HC_PLUGIN_URL . 'assets/main.js',
                [],
                HC_VERSION,
                true
            );
        }
    }

    private function page_has_hc_shortcode( $content ) {
        return preg_match( '/\[hc_[a-z0-9_]+/', $content );
    }

    private function normalize_module_key( $slug ) {
        $slug = remove_accents( wp_strip_all_tags( (string) $slug ) );
        $slug = function_exists( 'mb_strtolower' ) ? mb_strtolower( $slug, 'UTF-8' ) : strtolower( $slug );
        $slug = str_replace( [ '_', '-' ], ' ', $slug );
        $slug = preg_replace( '/[^\p{L}\p{N}]+/u', ' ', $slug );

        return trim( preg_replace( '/\s+/', ' ', $slug ) );
    }

    private function should_skip_module_directory( $module_path ) {
        $slug = basename( (string) $module_path );
        $slug = function_exists( 'mb_strtolower' ) ? mb_strtolower( $slug, 'UTF-8' ) : strtolower( $slug );

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
}
