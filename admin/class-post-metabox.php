<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HC_Post_Metabox {

    public function __construct() {
        add_action( 'add_meta_boxes',        [ $this, 'register' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ] );
    }

    public function register() {
        add_meta_box(
            'hc-ai-writer',
            '✨ AI Yazı Oluştur',
            [ $this, 'render' ],
            'post',
            'side',
            'high'
        );
    }

    public function enqueue( $hook ) {
        if ( ! in_array( $hook, [ 'post.php', 'post-new.php' ] ) ) return;

        wp_enqueue_script(
            'hc-metabox',
            HC_PLUGIN_URL . 'admin/metabox.js',
            [ 'jquery' ],
            HC_VERSION,
            true
        );
        wp_enqueue_style(
            'hc-metabox',
            HC_PLUGIN_URL . 'admin/metabox.css',
            [],
            HC_VERSION
        );
        wp_localize_script( 'hc-metabox', 'hcMetabox', [
            'nonce'   => wp_create_nonce( 'hc_ajax_nonce' ),
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
        ] );
    }

    public function render( $post ) {
        // Aktif modülleri listele
        $modules_dir = HC_PLUGIN_DIR . 'modules/';
        $modules     = [];
        if ( is_dir( $modules_dir ) ) {
            foreach ( glob( $modules_dir . '*', GLOB_ONLYDIR ) as $path ) {
                $slug      = basename( $path );
                $meta_file = $path . '/meta.json';
                $meta      = file_exists( $meta_file )
                    ? json_decode( file_get_contents( $meta_file ), true )
                    : [];
                $modules[] = [
                    'slug'      => $slug,
                    'name'      => $meta['name'] ?? $slug,
                    'shortcode' => '[hc_' . str_replace( '-', '_', $slug ) . ']',
                ];
            }
        }
        ?>
        <div id="hc-mb-wrap">
            <div class="hc-mb-group">
                <label>Hesaplama Aracı URL <small style="font-weight:normal;color:#999;">(opsiyonel)</small></label>
                <input type="url" id="hc-mb-url" placeholder="Boş bırakılırsa başlıktan üretir"
                       style="width:100%; margin-top:4px;" />
            </div>

            <?php if ( $modules ): ?>
            <div class="hc-mb-group">
                <label>Shortcode Ekle (opsiyonel)</label>
                <select id="hc-mb-shortcode" style="width:100%; margin-top:4px;">
                    <option value="">— Ekleme —</option>
                    <?php foreach ( $modules as $m ): ?>
                        <option value="<?php echo esc_attr( $m['shortcode'] ); ?>">
                            <?php echo esc_html( $m['name'] ); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php endif; ?>

            <button type="button" id="hc-mb-btn" class="button button-primary" style="width:100%; margin-top:8px;">
                ✨ Oluştur
            </button>

            <div id="hc-mb-loading" style="display:none; margin-top:10px; color:#666; font-size:12px;">
                ⏳ Yazı hazırlanıyor (20-60 sn)...
            </div>
            <div id="hc-mb-error" style="display:none; margin-top:8px; color:#d63638; font-size:12px;"></div>
            <div id="hc-mb-success" style="display:none; margin-top:8px; color:#1d7917; font-size:12px;">
                ✓ İçerik editöre eklendi. İnceleyip yayınlayabilirsiniz.
            </div>
        </div>
        <?php
    }
}
