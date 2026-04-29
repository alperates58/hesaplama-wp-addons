<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HC_AI_Writer {
    private const MIN_ARTICLE_WORDS = 300;
    private const MAX_EXPAND_ATTEMPTS = 3;

    public function __construct() {
        add_action( 'admin_init', [ $this, 'handle_ai_settings_save' ] );
        add_action( 'wp_ajax_hc_generate_article', [ $this, 'ajax_generate' ] );
        add_action( 'wp_ajax_hc_save_draft', [ $this, 'ajax_save_draft' ] );
        add_action( 'wp_ajax_hc_check_ai_usage', [ $this, 'ajax_check_usage' ] );
        add_action( 'wp_ajax_hc_create_module_post', [ $this, 'ajax_create_module_post' ] );
        add_action( 'wp_ajax_hc_update_post_meta', [ $this, 'ajax_update_post_meta' ] );
    }

    public function handle_ai_settings_save() {
        if (
            ! isset( $_POST['hc_save_ai'] ) ||
            ! check_admin_referer( 'hc_save_ai_settings' ) ||
            ! current_user_can( 'manage_options' )
        ) {
            return;
        }

        $provider = new HC_AI_Provider();
        $provider->save_settings( $_POST );

        wp_redirect( admin_url( 'admin.php?page=hesaplama-suite&tab=ai-settings&saved=1' ) );
        exit;
    }

    public function ajax_update_post_meta() {
        check_ajax_referer( 'hc_ajax_nonce', 'nonce' );

        $post_id = intval( $_POST['post_id'] ?? 0 );
        if ( ! $post_id || ! get_post( $post_id ) ) wp_send_json_error( 'Geçersiz yazı.' );
        if ( ! current_user_can( 'edit_post', $post_id ) ) wp_send_json_error( 'Yetkisiz.' );

        $baslik      = sanitize_text_field( wp_unslash( $_POST['baslik'] ?? '' ) );
        $icerik      = wp_kses_post( wp_unslash( $_POST['icerik'] ?? '' ) );
        $odak_kw     = sanitize_text_field( wp_unslash( $_POST['odak_anahtar_kelime'] ?? '' ) );
        $meta_baslik = sanitize_text_field( wp_unslash( $_POST['meta_baslik'] ?? '' ) );
        $meta_acik   = sanitize_textarea_field( wp_unslash( $_POST['meta_aciklama'] ?? '' ) );
        $url_slug    = sanitize_title( wp_unslash( $_POST['url_slug'] ?? '' ) );
        $etiketler   = $this->normalize_article_tags( (array) ( $_POST['etiketler'] ?? [] ), $baslik, $odak_kw );

        $post_data = [
            'ID' => $post_id,
        ];

        if ( $baslik ) {
            $post_data['post_title'] = $baslik;
        }

        if ( $icerik ) {
            $post_data['post_content'] = $icerik;
        }

        if ( $url_slug ) {
            $post_data['post_name'] = $url_slug;
        }

        if ( count( $post_data ) > 1 ) {
            $updated = wp_update_post( $post_data, true );
            if ( is_wp_error( $updated ) ) {
                wp_send_json_error( $updated->get_error_message() );
            }
        }

        update_post_meta( $post_id, '_yoast_wpseo_focuskw', $odak_kw );
        update_post_meta( $post_id, '_yoast_wpseo_title', $meta_baslik );
        update_post_meta( $post_id, '_yoast_wpseo_metadesc', $meta_acik );

        if ( $etiketler ) {
            wp_set_post_tags( $post_id, $etiketler, false );
        }

        wp_send_json_success();
    }

    private function normalize_article_tags( $tags, $title = '', $focus_keyword = '' ) {
        return $this->normalize_article_tags_seo( $tags, $title, $focus_keyword );
    }

    private function normalize_article_tags_seo( $tags, $title = '', $focus_keyword = '' ) {
        $raw_tags = array_map( 'sanitize_text_field', array_map( 'wp_unslash', (array) $tags ) );
        $bad_tags = [
            '2024',
            '2025',
            '2026',
            'hesaplama aracı',
            'hesaplama aracÄ±',
            'hesaplama',
            'risk',
            'sağlık',
            'saglik',
            'kan basıncı',
            'kan basinci',
            'tansiyon',
            'protein',
            'beslenme',
            'ssk',
            'bağ-kur',
            'baÄŸ-kur',
            'bag-kur',
        ];
        $clean = [];

        foreach ( $raw_tags as $tag ) {
            $this->add_clean_article_tag( $clean, $tag, $bad_tags );
        }

        $fallbacks = array_filter( [
            $focus_keyword,
            $title,
            $focus_keyword ? $focus_keyword . ' nasıl hesaplanır' : '',
            $focus_keyword ? $focus_keyword . ' değerleri' : '',
            $focus_keyword ? $focus_keyword . ' sonucu yorumu' : '',
        ] );

        foreach ( $fallbacks as $tag ) {
            $this->add_clean_article_tag( $clean, $tag, $bad_tags );
        }

        return array_slice( array_values( $clean ), 0, 5 );
    }

    private function add_clean_article_tag( &$clean, $tag, $bad_tags ) {
        $tag        = $this->normalize_article_tag_text( sanitize_text_field( $tag ) );
        $lower      = function_exists( 'mb_strtolower' ) ? mb_strtolower( $tag, 'UTF-8' ) : strtolower( $tag );
        $word_count = count( preg_split( '/\s+/', $tag, -1, PREG_SPLIT_NO_EMPTY ) );
        $length     = function_exists( 'mb_strlen' ) ? mb_strlen( $tag, 'UTF-8' ) : strlen( $tag );

        if ( $length < 8 || $word_count < 2 || $word_count > 5 || in_array( $lower, $bad_tags, true ) || isset( $clean[ $lower ] ) ) {
            return;
        }

        $clean[ $lower ] = $tag;
    }

    private function normalize_article_tag_text( $tag ) {
        $tag = trim( preg_replace( '/\s+/', ' ', (string) $tag ) );
        $tag = trim( $tag, " \t\n\r\0\x0B,.;:|#-" );

        return $tag;
    }

    public function ajax_generate() {
        check_ajax_referer( 'hc_ajax_nonce', 'nonce' );
        if ( ! current_user_can( 'manage_options' ) ) wp_send_json_error( 'Yetkisiz.' );

        $url   = esc_url_raw( $_POST['url'] ?? '' );
        $title = sanitize_text_field( $_POST['title'] ?? '' );

        if ( ! $url && ! $title ) wp_send_json_error( 'URL veya başlık gerekli.' );

        $page_text = '';
        if ( $url ) {
            $resp = wp_remote_get( $url, [
                'timeout'    => 15,
                'user-agent' => 'Mozilla/5.0 (compatible; HesaplamaSuite/1.0)',
            ] );
            if ( ! is_wp_error( $resp ) && wp_remote_retrieve_response_code( $resp ) === 200 ) {
                $page_text = $this->extract_text( wp_remote_retrieve_body( $resp ) );
            }
        }

        $provider = new HC_AI_Provider();
        $prompt   = $url
            ? $provider->build_prompt( $url, $page_text )
            : $provider->build_prompt_from_title( $title );

        $result = $provider->generate( $prompt );
        if ( is_wp_error( $result ) ) {
            wp_send_json_error( $result->get_error_message() );
        }

        $data = $this->decode_ai_json_response( $result );
        if ( ! $data ) {
            wp_send_json_error( 'AI yanıtı JSON olarak çözümlenemedi. Ham yanıt: ' . esc_html( substr( $result, 0, 300 ) ) );
        }

        $data = $this->expand_article_until_long_enough( $provider, $data, $prompt );

        wp_send_json_success( $data );
    }

    private function expand_article_until_long_enough( $provider, $data, $base_prompt ) {
        $best_data  = $data;
        $best_count = $this->count_article_words( $best_data['icerik'] ?? '' );

        for ( $attempt = 1; $attempt <= self::MAX_EXPAND_ATTEMPTS && $best_count < self::MIN_ARTICLE_WORDS; $attempt++ ) {
            $expand_prompt = $base_prompt . "\n\nMEVCUT JSON CIKTISI:\n" . wp_json_encode( $best_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . "\n\nEK KURAL:\n- Mevcut JSON yapisini koru.\n- Baslik, meta alanlari, etiketler ve kontrol alanlarini yine doldur.\n- Icerik alanini genislet; mevcut metni tekrarlama, anlamli yeni paragraflar, ornek hesaplama ve SSS ekle.\n- Icerik alani icin onerilen uzunluk en az " . self::MIN_ARTICLE_WORDS . " kelimedir; ulasamazsan en iyi, tutarli ve eksiksiz halini dondur.\n- Yanit sadece gecerli JSON olsun.\n";
            $expand_result = $provider->generate( $expand_prompt );

            if ( is_wp_error( $expand_result ) ) {
                continue;
            }

            $expanded_data = $this->decode_ai_json_response( $expand_result );
            if ( ! $expanded_data ) {
                continue;
            }

            $expanded_count = $this->count_article_words( $expanded_data['icerik'] ?? '' );
            if ( $expanded_count > $best_count ) {
                $best_data  = $expanded_data;
                $best_count = $expanded_count;
            }
        }

        return $best_data;
    }

    public function ajax_create_module_post() {
        check_ajax_referer( 'hc_ajax_nonce', 'nonce' );
        if ( ! current_user_can( 'edit_posts' ) ) wp_send_json_error( 'Yetkisiz.' );

        $name      = sanitize_text_field( $_POST['name'] ?? '' );
        $shortcode = sanitize_text_field( $_POST['shortcode'] ?? '' );

        if ( ! $name ) wp_send_json_error( 'Modül adı eksik.' );

        $existing = get_page_by_title( $name, OBJECT, 'post' );
        if ( $existing ) {
            wp_send_json_success( [
                'edit_url' => admin_url( 'post.php?post=' . $existing->ID . '&action=edit' ),
                'existing' => true,
            ] );
        }

        $slug = $this->turkish_slug( $name );

        $post_id = wp_insert_post( [
            'post_title'   => $name,
            'post_name'    => $slug,
            'post_content' => $shortcode ? $shortcode : '',
            'post_status'  => 'draft',
            'post_type'    => 'post',
        ] );

        if ( is_wp_error( $post_id ) ) {
            wp_send_json_error( $post_id->get_error_message() );
        }

        wp_send_json_success( [
            'edit_url' => admin_url( 'post.php?post=' . $post_id . '&action=edit' ),
            'existing' => false,
        ] );
    }

    private function turkish_slug( $text ) {
        $tr   = [ 'ş', 'Ş', 'ı', 'İ', 'ğ', 'Ğ', 'ü', 'Ü', 'ö', 'Ö', 'ç', 'Ç' ];
        $en   = [ 's', 's', 'i', 'i', 'g', 'g', 'u', 'u', 'o', 'o', 'c', 'c' ];
        $text = str_replace( $tr, $en, $text );
        $text = sanitize_title( $text );
        return $text;
    }

    public function ajax_check_usage() {
        check_ajax_referer( 'hc_ajax_nonce', 'nonce' );
        if ( ! current_user_can( 'manage_options' ) ) wp_send_json_error( 'Yetkisiz.' );

        $provider = new HC_AI_Provider();
        $result   = $provider->get_openai_usage();

        if ( is_wp_error( $result ) ) {
            wp_send_json_error( $result->get_error_message() );
        }

        wp_send_json_success( $result );
    }

    public function ajax_save_draft() {
        check_ajax_referer( 'hc_ajax_nonce', 'nonce' );
        if ( ! current_user_can( 'edit_posts' ) ) wp_send_json_error( 'Yetkisiz.' );

        $baslik      = sanitize_text_field( $_POST['baslik'] ?? '' );
        $icerik      = wp_kses_post( $_POST['icerik'] ?? '' );
        $odak_kw     = sanitize_text_field( $_POST['odak_anahtar_kelime'] ?? '' );
        $meta_baslik = sanitize_text_field( $_POST['meta_baslik'] ?? '' );
        $meta_acik   = sanitize_textarea_field( $_POST['meta_aciklama'] ?? '' );
        $url_slug    = sanitize_title( $_POST['url_slug'] ?? '' );
        $etiketler   = $this->normalize_article_tags( (array) ( $_POST['etiketler'] ?? [] ), $baslik, $odak_kw );
        $shortcode   = sanitize_text_field( $_POST['shortcode'] ?? '' );

        if ( $shortcode ) {
            $icerik = '<p>' . $shortcode . '</p>' . "\n\n" . $icerik;
        }

        $post_id = wp_insert_post( [
            'post_title'   => $baslik,
            'post_name'    => $url_slug,
            'post_content' => $icerik,
            'post_status'  => 'draft',
            'post_type'    => 'post',
        ] );

        if ( is_wp_error( $post_id ) ) {
            wp_send_json_error( $post_id->get_error_message() );
        }

        update_post_meta( $post_id, '_yoast_wpseo_focuskw', $odak_kw );
        update_post_meta( $post_id, '_yoast_wpseo_title', $meta_baslik );
        update_post_meta( $post_id, '_yoast_wpseo_metadesc', $meta_acik );

        if ( $etiketler ) {
            wp_set_post_tags( $post_id, $etiketler, false );
        }

        $edit_url = admin_url( 'post.php?post=' . $post_id . '&action=edit' );
        wp_send_json_success( [ 'post_id' => $post_id, 'edit_url' => $edit_url ] );
    }

    private function extract_text( $html ) {
        $html = preg_replace( '/<(script|style)[^>]*>.*?<\/\1>/si', '', $html );
        $text = wp_strip_all_tags( $html );
        $text = preg_replace( '/\s+/', ' ', $text );
        return trim( substr( $text, 0, 4000 ) );
    }

    private function decode_ai_json_response( $result ) {
        $clean = preg_replace( '/^```(?:json)?\s*/i', '', trim( $result ) );
        $clean = preg_replace( '/\s*```$/', '', $clean );
        return json_decode( $clean, true );
    }

    private function count_article_words( $html ) {
        $text = wp_strip_all_tags( (string) $html );
        $text = trim( preg_replace( '/\s+/u', ' ', $text ) );

        if ( '' === $text ) {
            return 0;
        }

        $words = preg_split( '/\s+/u', $text, -1, PREG_SPLIT_NO_EMPTY );
        return is_array( $words ) ? count( $words ) : 0;
    }

    public function render_ai_settings_tab() {
        $provider = new HC_AI_Provider();
        $s        = $provider->get_settings();
        $saved    = isset( $_GET['saved'] );

        $openai_modeller = [
            'gpt-4o-mini'   => 'GPT-4o Mini — Ucuz, Hızlı (Önerilen)',
            'gpt-5-mini'    => 'GPT-5 Mini — Erişim varsa daha kaliteli',
            'gpt-4o'        => 'GPT-4o — En Güçlü',
            'gpt-4-turbo'   => 'GPT-4 Turbo',
            'gpt-3.5-turbo' => 'GPT-3.5 Turbo — En Ucuz',
        ];
        $gemini_modeller = [
            'gemini-2.0-flash-lite' => 'Gemini 2.0 Flash Lite',
            'gemini-2.0-flash'      => 'Gemini 2.0 Flash',
            'gemini-1.5-flash'      => 'Gemini 1.5 Flash',
            'gemini-1.5-pro'        => 'Gemini 1.5 Pro',
        ];
        ?>
        <?php if ( $saved ): ?>
            <div class="notice notice-success is-dismissible"><p>AI ayarları kaydedildi.</p></div>
        <?php endif; ?>

        <div class="hc-card">
            <h2>Yapay Zeka Ayarları</h2>

            <form method="post">
                <?php wp_nonce_field( 'hc_save_ai_settings' ); ?>
                <table class="form-table">
                    <tr>
                        <th><label for="provider">Sağlayıcı</label></th>
                        <td>
                            <select id="hc-ai-provider" name="provider" onchange="hcToggleProvider(this.value)">
                                <option value="openai" <?php selected( $s['provider'], 'openai' ); ?>>OpenAI (ChatGPT)</option>
                                <option value="gemini" <?php selected( $s['provider'], 'gemini' ); ?>>Google Gemini</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="api_key">API Key</label></th>
                        <td>
                            <input type="password" id="api_key" name="api_key"
                                   value="<?php echo esc_attr( $s['api_key'] ); ?>"
                                   class="regular-text"
                                   placeholder="<?php echo $s['provider'] === 'gemini' ? 'AIza...' : 'sk-...'; ?>" />
                            <p class="description" id="hc-key-hint">
                                <?php if ( $s['provider'] === 'openai' ): ?>
                                    <a href="https://platform.openai.com/api-keys" target="_blank">platform.openai.com/api-keys</a> → Create new secret key
                                <?php else: ?>
                                    <a href="https://aistudio.google.com/app/apikey" target="_blank">aistudio.google.com/app/apikey</a>
                                <?php endif; ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="model">Model</label></th>
                        <td>
                            <select id="model" name="model">
                                <optgroup label="OpenAI" id="hc-openai-models"
                                    <?php echo $s['provider'] === 'gemini' ? 'style="display:none"' : ''; ?>>
                                    <?php foreach ( $openai_modeller as $val => $label ): ?>
                                        <option value="<?php echo esc_attr( $val ); ?>" <?php selected( $s['model'], $val ); ?>>
                                            <?php echo esc_html( $label ); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </optgroup>
                                <optgroup label="Gemini" id="hc-gemini-models"
                                    <?php echo $s['provider'] === 'openai' ? 'style="display:none"' : ''; ?>>
                                    <?php foreach ( $gemini_modeller as $val => $label ): ?>
                                        <option value="<?php echo esc_attr( $val ); ?>" <?php selected( $s['model'], $val ); ?>>
                                            <?php echo esc_html( $label ); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </optgroup>
                            </select>
                        </td>
                    </tr>
                </table>
                <p class="submit">
                    <button type="submit" name="hc_save_ai" class="button button-primary">Kaydet</button>
                    <button type="button" id="hc-check-usage-btn" class="button" style="margin-left:8px;">
                        Kullanımı Kontrol Et
                    </button>
                </p>
            </form>
        </div>

        <div id="hc-usage-card" class="hc-card" style="display:none; border-left:4px solid #2271b1;">
            <h2>Kullanım Durumu</h2>
            <div id="hc-usage-content"></div>
            <p style="margin-top:12px;">
                <a href="https://platform.openai.com/usage" target="_blank">
                    → Detaylı kullanım için platform.openai.com/usage
                </a>
            </p>
        </div>

        <script>
        function hcToggleProvider(val) {
            var isOpenai = val === 'openai';
            document.getElementById('hc-openai-models').style.display = isOpenai ? '' : 'none';
            document.getElementById('hc-gemini-models').style.display = isOpenai ? 'none' : '';
            document.getElementById('api_key').placeholder = isOpenai ? 'sk-...' : 'AIza...';
        }
        </script>
        <?php
    }

    public function render_writer_tab() {
        $modules_dir = HC_PLUGIN_DIR . 'modules/';
        $modules     = [];

        if ( is_dir( $modules_dir ) ) {
            foreach ( glob( $modules_dir . '*', GLOB_ONLYDIR ) as $path ) {
                $slug      = basename( $path );
                $meta_file = $path . '/meta.json';
                $meta      = file_exists( $meta_file ) ? json_decode( file_get_contents( $meta_file ), true ) : [];
                $modules[] = [
                    'name'      => $meta['name'] ?? $slug,
                    'shortcode' => '[hc_' . str_replace( '-', '_', $slug ) . ']',
                ];
            }
        }
        ?>
        <div class="hc-card">
            <h2>Yazı Oluştur</h2>
            <p>Hesaplama aracının URL'ini girin, yapay zeka SEO uyumlu Türkçe makaleyi hazırlasın.</p>

            <div class="hc-form-group">
                <label for="hc-writer-url"><strong>Hesaplama Aracı URL'si</strong></label>
                <input type="url" id="hc-writer-url" class="large-text" placeholder="https://hesaplamaa.com/..." />
            </div>

            <?php if ( $modules ): ?>
            <div class="hc-form-group">
                <label for="hc-writer-shortcode"><strong>Hesap Makinesi Shortcode</strong> <small>(yazının en üstüne eklenir)</small></label>
                <select id="hc-writer-shortcode" class="regular-text">
                    <option value="">— Ekleme —</option>
                    <?php foreach ( $modules as $m ): ?>
                        <option value="<?php echo esc_attr( $m['shortcode'] ); ?>">
                            <?php echo esc_html( $m['name'] ); ?> — <?php echo esc_html( $m['shortcode'] ); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php endif; ?>

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
                        <th><label>İkincil Anahtar Kelimeler</label></th>
                        <td><input type="text" id="hc-r-ikincil" class="large-text" placeholder="virgülle ayrılmış" /></td>
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
                        <th><label>URL Slug</label></th>
                        <td><input type="text" id="hc-r-url-slug" class="large-text" placeholder="ornek-url-slug" /></td>
                    </tr>
                    <tr>
                        <th><label>Yazı Başlığı (H1)</label></th>
                        <td><input type="text" id="hc-r-baslik" class="large-text" /></td>
                    </tr>
                </table>
            </div>

            <div class="hc-card">
                <h2>Ek SEO Notları</h2>
                <table class="form-table">
                    <tr>
                        <th><label>İç Link Önerileri</label></th>
                        <td>
                            <textarea id="hc-r-ic-linkler" class="large-text" rows="4" placeholder="Her satıra bir öneri"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Görsel ALT Text</label></th>
                        <td><input type="text" id="hc-r-alt-text" class="large-text" /></td>
                    </tr>
                    <tr>
                        <th><label>Yoast Kontrol</label></th>
                        <td><textarea id="hc-r-yoast" class="large-text" rows="6" readonly></textarea></td>
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
