<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HC_AI_Writer {

    public function __construct() {
        add_action( 'admin_init',              [ $this, 'handle_ai_settings_save' ] );
        add_action( 'wp_ajax_hc_generate_article', [ $this, 'ajax_generate' ] );
        add_action( 'wp_ajax_hc_save_draft',       [ $this, 'ajax_save_draft' ] );
    }

    public function handle_ai_settings_save() {
        if (
            ! isset( $_POST['hc_save_ai'] ) ||
            ! check_admin_referer( 'hc_save_ai_settings' ) ||
            ! current_user_can( 'manage_options' )
        ) return;

        $provider = new HC_AI_Provider();
        $provider->save_settings( $_POST );

        wp_redirect( admin_url( 'admin.php?page=hesaplama-suite&tab=ai-settings&saved=1' ) );
        exit;
    }

    /* AJAX: URL'den makale üret */
    public function ajax_generate() {
        check_ajax_referer( 'hc_ajax_nonce', 'nonce' );
        if ( ! current_user_can( 'manage_options' ) ) wp_send_json_error( 'Yetkisiz.' );

        $url = esc_url_raw( $_POST['url'] ?? '' );
        if ( ! $url ) wp_send_json_error( 'URL gerekli.' );

        // Sayfayı çek
        $resp = wp_remote_get( $url, [
            'timeout'    => 15,
            'user-agent' => 'Mozilla/5.0 (compatible; HesaplamaSuite/1.0)',
        ] );

        $page_text = '';
        if ( ! is_wp_error( $resp ) && wp_remote_retrieve_response_code( $resp ) === 200 ) {
            $html      = wp_remote_retrieve_body( $resp );
            $page_text = $this->extract_text( $html );
        }

        $provider = new HC_AI_Provider();
        $prompt   = $provider->build_prompt( $url, $page_text );
        $result   = $provider->generate( $prompt );

        if ( is_wp_error( $result ) ) {
            wp_send_json_error( $result->get_error_message() );
        }

        // JSON temizle (Gemini bazen ```json ... ``` sarıyor)
        $clean = preg_replace( '/^```(?:json)?\s*/i', '', trim( $result ) );
        $clean = preg_replace( '/\s*```$/', '', $clean );
        $data  = json_decode( $clean, true );

        if ( ! $data ) {
            wp_send_json_error( 'AI yanıtı JSON olarak çözümlenemedi. Ham yanıt: ' . esc_html( substr( $result, 0, 300 ) ) );
        }

        wp_send_json_success( $data );
    }

    /* AJAX: WP taslak olarak kaydet + Yoast alanları */
    public function ajax_save_draft() {
        check_ajax_referer( 'hc_ajax_nonce', 'nonce' );
        if ( ! current_user_can( 'edit_posts' ) ) wp_send_json_error( 'Yetkisiz.' );

        $baslik      = sanitize_text_field( $_POST['baslik']              ?? '' );
        $icerik      = wp_kses_post( $_POST['icerik']                     ?? '' );
        $odak_kw     = sanitize_text_field( $_POST['odak_anahtar_kelime'] ?? '' );
        $meta_baslik = sanitize_text_field( $_POST['meta_baslik']         ?? '' );
        $meta_acik   = sanitize_textarea_field( $_POST['meta_aciklama']   ?? '' );
        $etiketler   = array_map( 'sanitize_text_field', (array) ( $_POST['etiketler'] ?? [] ) );

        $post_id = wp_insert_post( [
            'post_title'   => $baslik,
            'post_content' => $icerik,
            'post_status'  => 'draft',
            'post_type'    => 'post',
        ] );

        if ( is_wp_error( $post_id ) ) {
            wp_send_json_error( $post_id->get_error_message() );
        }

        // Yoast SEO meta alanları
        update_post_meta( $post_id, '_yoast_wpseo_focuskw',  $odak_kw );
        update_post_meta( $post_id, '_yoast_wpseo_title',    $meta_baslik );
        update_post_meta( $post_id, '_yoast_wpseo_metadesc', $meta_acik );

        // Etiketler
        if ( $etiketler ) {
            wp_set_post_tags( $post_id, $etiketler, false );
        }

        $edit_url = admin_url( 'post.php?post=' . $post_id . '&action=edit' );
        wp_send_json_success( [ 'post_id' => $post_id, 'edit_url' => $edit_url ] );
    }

    /* HTML'den sade metin çıkart */
    private function extract_text( $html ) {
        // script/style kaldır
        $html = preg_replace( '/<(script|style)[^>]*>.*?<\/\1>/si', '', $html );
        $text = wp_strip_all_tags( $html );
        $text = preg_replace( '/\s+/', ' ', $text );
        return trim( substr( $text, 0, 4000 ) ); // token limitini aşmamak için
    }

    /* ---- Render yöntemleri ---- */

    public function render_ai_settings_tab() {
        $provider = new HC_AI_Provider();
        $s        = $provider->get_settings();
        $saved    = isset( $_GET['saved'] );
        ?>
        <?php if ( $saved ): ?>
            <div class="notice notice-success is-dismissible"><p>AI ayarları kaydedildi.</p></div>
        <?php endif; ?>

        <div class="hc-card">
            <h2>Yapay Zeka Ayarları</h2>
            <p>
                Google AI Studio'dan ücretsiz API key alabilirsiniz:
                <a href="https://aistudio.google.com/app/apikey" target="_blank">aistudio.google.com</a>
            </p>

            <form method="post">
                <?php wp_nonce_field( 'hc_save_ai_settings' ); ?>
                <table class="form-table">
                    <tr>
                        <th><label for="api_key">Gemini API Key</label></th>
                        <td>
                            <input type="password" id="api_key" name="api_key"
                                   value="<?php echo esc_attr( $s['api_key'] ); ?>"
                                   class="regular-text" placeholder="AIza..." />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="model">Model</label></th>
                        <td>
                            <select id="model" name="model">
                                <?php
                                $modeller = [
                                    'gemini-2.0-flash'         => 'Gemini 2.0 Flash (Ücretsiz, Önerilen)',
                                    'gemini-1.5-flash'         => 'Gemini 1.5 Flash (Ücretsiz)',
                                    'gemini-1.5-pro'           => 'Gemini 1.5 Pro (Ücretli)',
                                    'gemini-2.0-flash-thinking-exp' => 'Gemini 2.0 Flash Thinking (Deneysel)',
                                ];
                                foreach ( $modeller as $val => $label ):
                                ?>
                                    <option value="<?php echo esc_attr( $val ); ?>"
                                        <?php selected( $s['model'], $val ); ?>>
                                        <?php echo esc_html( $label ); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <p class="submit">
                    <button type="submit" name="hc_save_ai" class="button button-primary">Kaydet</button>
                </p>
            </form>
        </div>
        <?php
    }

    public function render_writer_tab() {
        ?>
        <div class="hc-card">
            <h2>Yazı Oluştur</h2>
            <p>Hesaplama aracının URL'ini girin, yapay zeka SEO uyumlu Türkçe makaleyi hazırlasın.</p>

            <div class="hc-form-group">
                <label for="hc-writer-url"><strong>Hesaplama Aracı URL'si</strong></label>
                <input type="url" id="hc-writer-url" class="large-text"
                       placeholder="https://hesaplamaa.com/..." />
            </div>
            <button id="hc-writer-btn" class="button button-primary" style="margin-bottom:20px;">
                ✨ Makale Oluştur
            </button>

            <div id="hc-writer-loading" style="display:none; padding:16px 0; color:#666;">
                ⏳ Yapay zeka makaleyi yazıyor, lütfen bekleyin (20-60 saniye)...
            </div>
            <div id="hc-writer-error" class="notice notice-error" style="display:none; padding:8px 16px;"></div>
        </div>

        <div id="hc-writer-result" style="display:none;">

            <div class="hc-card">
                <h2>SEO Bilgileri</h2>
                <table class="form-table">
                    <tr>
                        <th><label>Odak Anahtar Kelime</label></th>
                        <td><input type="text" id="hc-r-odak" class="large-text" /></td>
                    </tr>
                    <tr>
                        <th><label>Meta Başlık <small style="font-weight:normal;color:#888;">(55-60 karakter)</small></label></th>
                        <td>
                            <input type="text" id="hc-r-meta-baslik" class="large-text" />
                            <p class="description">Karakter: <span id="hc-mb-count">0</span></p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Meta Açıklama <small style="font-weight:normal;color:#888;">(120-155 karakter)</small></label></th>
                        <td>
                            <textarea id="hc-r-meta-acik" class="large-text" rows="3"></textarea>
                            <p class="description">Karakter: <span id="hc-ma-count">0</span></p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Etiketler</label></th>
                        <td><input type="text" id="hc-r-etiketler" class="large-text" placeholder="virgülle ayrılmış" /></td>
                    </tr>
                    <tr>
                        <th><label>Yazı Başlığı (H1)</label></th>
                        <td><input type="text" id="hc-r-baslik" class="large-text" /></td>
                    </tr>
                </table>
            </div>

            <div class="hc-card">
                <h2>Makale İçeriği</h2>
                <p class="description" style="margin-bottom:12px;">İçeriği düzenleyebilirsiniz.</p>
                <textarea id="hc-r-icerik" style="width:100%; min-height:500px; font-family:monospace; font-size:13px;"></textarea>
            </div>

            <div class="hc-card" style="border-left:4px solid #1d7917;">
                <h2>WordPress'e Kaydet</h2>
                <p>Tüm alanlar (Yoast SEO dahil) otomatik doldurularak <strong>taslak</strong> olarak kaydedilir.</p>
                <button id="hc-save-draft-btn" class="button button-primary" style="font-size:15px; padding:8px 20px; height:auto;">
                    💾 Taslak Olarak Kaydet
                </button>
                <span id="hc-save-msg" style="margin-left:14px; line-height:36px;"></span>
            </div>
        </div>
        <?php
    }
}
