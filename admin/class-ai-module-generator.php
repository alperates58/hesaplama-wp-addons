<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HC_AI_Module_Generator {

    private const MODEL = 'gpt-5-mini';

    public function __construct() {
        add_action( 'wp_ajax_hc_generate_module_preview', [ $this, 'ajax_generate_module_preview' ] );
        add_action( 'wp_ajax_hc_save_module_files', [ $this, 'ajax_save_module_files' ] );
        add_action( 'wp_ajax_hc_publish_module_github', [ $this, 'ajax_publish_module_github' ] );
    }

    public static function render_generator_tab() {
        $provider = new HC_AI_Provider();

        if ( ! $provider->is_feature_enabled( 'module_generator' ) ) {
            ?>
            <div class="hc-card">
                <h2>AI Modül Oluştur</h2>
                <p>AI ile modül oluşturma şu anda kapalı. AI Ayarları sekmesinden tekrar açabilirsiniz.</p>
            </div>
            <?php
            return;
        }
        ?>
        <div class="hc-card">
            <div class="hc-card-head">
                <div>
                    <h2>AI Modül Oluştur</h2>
                    <p class="hc-card-copy">Konu veya URL girin; GPT-5 mini yeni hesap makinesi modülü için güvenli bir dosya taslağı hazırlasın.</p>
                </div>
                <div class="hc-inline-badge">Model: <?php echo esc_html( self::MODEL ); ?></div>
            </div>

            <div class="hc-field-grid">
                <div class="hc-field-card">
                    <label for="hc-module-topic"><strong>Konu veya hesap makinesi adı</strong></label>
                    <input type="text" id="hc-module-topic" class="large-text" placeholder="Örn: Vücut yağ oranı hesaplama" />
                    <p class="description">URL vermeden de çalışır; ancak formül hassassa kaynak notu eklemek daha güvenli olur.</p>
                </div>
                <div class="hc-field-card">
                    <label for="hc-module-url"><strong>Kaynak URL</strong></label>
                    <input type="url" id="hc-module-url" class="large-text" placeholder="https://..." />
                    <p class="description">Sayfa okunabilirse giriş alanları ve hesaplama mantığı prompt'a eklenir.</p>
                </div>
            </div>

            <div class="hc-form-group" style="margin-top:16px;">
                <label for="hc-module-notes"><strong>Ek formül / kaynak notları</strong></label>
                <textarea id="hc-module-notes" class="large-text" rows="5" placeholder="Formül, özel kural, kaynak linki veya dikkat edilecek noktalar..."></textarea>
            </div>

            <button type="button" id="hc-module-generate-btn" class="button button-primary">
                Modül Taslağı Oluştur
            </button>
            <span id="hc-module-generate-status" class="hc-action-status"></span>
            <div id="hc-module-error" class="notice notice-error" style="display:none; padding:8px 16px; margin-top:16px;"></div>
        </div>

        <div id="hc-module-preview" style="display:none;">
            <div class="hc-card">
                <div class="hc-card-head">
                    <div>
                        <h2>Taslak Özeti</h2>
                        <p class="hc-card-copy">Kaydetmeden önce adı, slug'ı ve dosya içeriklerini gözden geçirin.</p>
                    </div>
                    <div class="hc-inline-badge" id="hc-module-shortcode-badge"></div>
                </div>
                <div class="hc-meta-list">
                    <div><span>Modül adı</span><strong id="hc-module-name-label"></strong></div>
                    <div><span>Slug</span><strong><code id="hc-module-slug-label"></code></strong></div>
                    <div><span>Path</span><strong><code id="hc-module-path-label"></code></strong></div>
                    <div><span>Açıklama</span><strong id="hc-module-desc-label"></strong></div>
                    <div><span>Kaynak</span><strong id="hc-module-source-label"></strong></div>
                </div>
                <div id="hc-module-review-note" class="notice notice-warning" style="display:none; padding:8px 16px; margin-top:16px;"></div>
            </div>

            <div class="hc-card">
                <h2>Dosyalar</h2>
                <div class="hc-module-file-grid">
                    <label>meta.json<textarea id="hc-file-meta" rows="10"></textarea></label>
                    <label>calculator.php<textarea id="hc-file-php" rows="18"></textarea></label>
                    <label>calculator.js<textarea id="hc-file-js" rows="18"></textarea></label>
                    <label>calculator.css<textarea id="hc-file-css" rows="18"></textarea></label>
                </div>
            </div>

            <div class="hc-card hc-update-box">
                <h2>Kaydet ve Gönder</h2>
                <p>Modül yalnızca yeni bir <code>modules/{slug}/</code> klasörüne kaydedilir. Var olan modüllerin üstüne yazılmaz.</p>
                <button type="button" id="hc-module-save-btn" class="button button-primary">Modülü Eklentiye Kaydet</button>
                <button type="button" id="hc-module-publish-btn" class="button" disabled>GitHub'a Gönder</button>
                <span id="hc-module-save-status" class="hc-action-status"></span>
            </div>
        </div>
        <?php
    }

    public function ajax_generate_module_preview() {
        check_ajax_referer( 'hc_ajax_nonce', 'nonce' );
        if ( ! current_user_can( 'manage_options' ) ) wp_send_json_error( 'Yetkisiz.' );

        $topic = sanitize_text_field( wp_unslash( $_POST['topic'] ?? '' ) );
        $url   = esc_url_raw( wp_unslash( $_POST['url'] ?? '' ) );
        $notes = sanitize_textarea_field( wp_unslash( $_POST['notes'] ?? '' ) );

        if ( ! $topic && ! $url ) {
            wp_send_json_error( 'Konu veya URL gerekli.' );
        }

        $provider = new HC_AI_Provider();
        $settings = $provider->get_settings();

        if ( 'openai' !== $settings['provider'] ) {
            wp_send_json_error( 'Modül üretici GPT-5 mini kullanır. Lütfen AI Ayarları sekmesinde sağlayıcıyı OpenAI seçin.' );
        }

        if ( ! $provider->is_feature_enabled( 'module_generator' ) ) {
            wp_send_json_error( 'AI modül oluşturma kapalı.' );
        }

        $page_text = $url ? $this->fetch_source_text( $url ) : '';
        $prompt    = $this->build_module_prompt( $topic, $url, $notes, $page_text );
        $result    = $provider->generate_with_model( $prompt, self::MODEL );

        if ( is_wp_error( $result ) ) {
            wp_send_json_error( $result->get_error_message() );
        }

        $data = $this->decode_json_response( $result );

        if ( ! $data || empty( $data['module'] ) || empty( $data['files'] ) ) {
            wp_send_json_error( 'AI yanıtı geçerli modül JSON formatında değil. Ham yanıt: ' . esc_html( substr( $result, 0, 300 ) ) );
        }

        $data = $this->normalize_preview_data( $data );
        $validation = $this->validate_module_payload( $data, false );

        if ( is_wp_error( $validation ) ) {
            wp_send_json_error( $validation->get_error_message() );
        }

        wp_send_json_success( $data );
    }

    public function ajax_save_module_files() {
        check_ajax_referer( 'hc_ajax_nonce', 'nonce' );
        if ( ! current_user_can( 'manage_options' ) ) wp_send_json_error( 'Yetkisiz.' );

        $data = $this->get_payload_from_request();
        $validation = $this->validate_module_payload( $data, true );

        if ( is_wp_error( $validation ) ) {
            wp_send_json_error( $validation->get_error_message() );
        }

        $slug       = $data['module']['slug'];
        $module_dir = HC_PLUGIN_DIR . 'modules/' . $slug;

        if ( file_exists( $module_dir ) ) {
            wp_send_json_error( 'Bu slug ile modül zaten var. Mevcut modüllerin üzerine yazılamaz.' );
        }

        if ( ! wp_mkdir_p( $module_dir ) ) {
            wp_send_json_error( 'Modül klasörü oluşturulamadı.' );
        }

        $files = [
            'meta.json'      => $data['files']['meta_json'],
            'calculator.php' => $data['files']['calculator_php'],
            'calculator.js'  => $data['files']['calculator_js'],
            'calculator.css' => $data['files']['calculator_css'],
        ];

        foreach ( $files as $filename => $content ) {
            $written = file_put_contents( $module_dir . '/' . $filename, $content );
            if ( false === $written ) {
                wp_send_json_error( $filename . ' yazılamadı.' );
            }
        }

        wp_send_json_success( [
            'slug'      => $slug,
            'shortcode' => $data['module']['shortcode'],
            'path'      => 'modules/' . $slug . '/',
        ] );
    }

    public function ajax_publish_module_github() {
        check_ajax_referer( 'hc_ajax_nonce', 'nonce' );
        if ( ! current_user_can( 'manage_options' ) ) wp_send_json_error( 'Yetkisiz.' );

        $data = $this->get_payload_from_request();
        $validation = $this->validate_module_payload( $data, false );

        if ( is_wp_error( $validation ) ) {
            wp_send_json_error( $validation->get_error_message() );
        }

        $updater  = new HC_Github_Updater();
        $settings = $updater->get_settings();

        if ( empty( $settings['repo'] ) || empty( $settings['branch'] ) || empty( $settings['token'] ) ) {
            wp_send_json_error( 'GitHub repo, branch veya token ayarı eksik.' );
        }

        $slug    = $data['module']['slug'];
        $message = "feat: {$data['module']['name']} modülü eklendi\n\nShortcode: {$data['module']['shortcode']}\nKaynak: " . ( $data['module']['source_url'] ?: 'Admin panel AI modül üretici' );

        if ( ! empty( $data['module']['formula_source_url'] ) ) {
            $message .= "\nFormül kaynağı: " . $data['module']['formula_source_url'];
        }

        $files = [
            "modules/{$slug}/meta.json"      => $data['files']['meta_json'],
            "modules/{$slug}/calculator.php" => $data['files']['calculator_php'],
            "modules/{$slug}/calculator.js"  => $data['files']['calculator_js'],
            "modules/{$slug}/calculator.css" => $data['files']['calculator_css'],
        ];

        $result = $this->github_commit_files( $settings, $files, $message );

        if ( is_wp_error( $result ) ) {
            wp_send_json_error( $result->get_error_message() );
        }

        wp_send_json_success( [
            'repo'   => $settings['repo'],
            'branch' => $settings['branch'],
            'slug'   => $slug,
            'sha'    => $result['sha'] ?? '',
        ] );
    }

    private function github_commit_files( $settings, $files, $message ) {
        $repo_api = 'https://api.github.com/repos/' . str_replace( '%2F', '/', rawurlencode( $settings['repo'] ) );
        $branch   = rawurlencode( $settings['branch'] );
        $ref      = $this->github_request( $settings, 'GET', "{$repo_api}/git/ref/heads/{$branch}" );

        if ( is_wp_error( $ref ) ) return $ref;

        $parent_sha = $ref['object']['sha'] ?? '';
        if ( ! $parent_sha ) {
            return new WP_Error( 'github_ref_error', 'GitHub branch referansı okunamadı.' );
        }

        $parent = $this->github_request( $settings, 'GET', "{$repo_api}/git/commits/{$parent_sha}" );
        if ( is_wp_error( $parent ) ) return $parent;

        $base_tree = $parent['tree']['sha'] ?? '';
        if ( ! $base_tree ) {
            return new WP_Error( 'github_tree_error', 'GitHub base tree okunamadı.' );
        }

        $tree = [];
        foreach ( $files as $path => $content ) {
            $exists = $this->github_file_exists( $settings, $repo_api, $path );
            if ( is_wp_error( $exists ) ) return $exists;
            if ( $exists ) {
                return new WP_Error( 'github_file_exists', 'GitHub üzerinde bu modül dosyası zaten var: ' . $path );
            }

            $blob = $this->github_request( $settings, 'POST', "{$repo_api}/git/blobs", [
                'content'  => $content,
                'encoding' => 'utf-8',
            ] );

            if ( is_wp_error( $blob ) ) return $blob;

            $tree[] = [
                'path' => $path,
                'mode' => '100644',
                'type' => 'blob',
                'sha'  => $blob['sha'] ?? '',
            ];
        }

        $new_tree = $this->github_request( $settings, 'POST', "{$repo_api}/git/trees", [
            'base_tree' => $base_tree,
            'tree'      => $tree,
        ] );

        if ( is_wp_error( $new_tree ) ) return $new_tree;

        $commit = $this->github_request( $settings, 'POST', "{$repo_api}/git/commits", [
            'message' => $message,
            'tree'    => $new_tree['sha'] ?? '',
            'parents' => [ $parent_sha ],
        ] );

        if ( is_wp_error( $commit ) ) return $commit;

        $updated = $this->github_request( $settings, 'PATCH', "{$repo_api}/git/refs/heads/{$branch}", [
            'sha'   => $commit['sha'] ?? '',
            'force' => false,
        ] );

        if ( is_wp_error( $updated ) ) return $updated;

        return $commit;
    }

    private function github_file_exists( $settings, $repo_api, $path ) {
        $url  = "{$repo_api}/contents/" . str_replace( '%2F', '/', rawurlencode( $path ) ) . '?ref=' . rawurlencode( $settings['branch'] );
        $resp = wp_remote_get( $url, [
            'timeout' => 20,
            'headers' => [
                'Authorization' => 'token ' . $settings['token'],
                'Content-Type'  => 'application/json',
                'User-Agent'    => 'hesaplama-suite',
            ],
        ] );

        if ( is_wp_error( $resp ) ) return $resp;

        $code = wp_remote_retrieve_response_code( $resp );
        if ( 404 === $code ) return false;
        if ( $code >= 200 && $code < 300 ) return true;

        $data = json_decode( wp_remote_retrieve_body( $resp ), true );
        return new WP_Error( 'github_error', $data['message'] ?? 'GitHub dosya kontrol hatası.' );
    }

    private function github_request( $settings, $method, $url, $body = null ) {
        $args = [
            'method'  => $method,
            'timeout' => 45,
            'headers' => [
                'Authorization' => 'token ' . $settings['token'],
                'Content-Type'  => 'application/json',
                'User-Agent'    => 'hesaplama-suite',
            ],
        ];

        if ( null !== $body ) {
            $args['body'] = wp_json_encode( $body );
        }

        $resp = wp_remote_request( $url, $args );
        if ( is_wp_error( $resp ) ) return $resp;

        $code = wp_remote_retrieve_response_code( $resp );
        $data = json_decode( wp_remote_retrieve_body( $resp ), true );

        if ( $code < 200 || $code >= 300 ) {
            return new WP_Error( 'github_error', $data['message'] ?? 'GitHub API hatası.' );
        }

        return is_array( $data ) ? $data : [];
    }

    private function fetch_source_text( $url ) {
        $resp = wp_remote_get( $url, [
            'timeout'    => 18,
            'user-agent' => 'Mozilla/5.0 (compatible; HesaplamaSuite/1.0)',
        ] );

        if ( is_wp_error( $resp ) || 200 !== wp_remote_retrieve_response_code( $resp ) ) {
            return '';
        }

        $html = wp_remote_retrieve_body( $resp );
        $html = preg_replace( '/<(script|style)[^>]*>.*?<\/\1>/si', '', $html );
        $text = wp_strip_all_tags( $html );
        $text = preg_replace( '/\s+/', ' ', $text );

        return trim( substr( $text, 0, 7000 ) );
    }

    private function build_module_prompt( $topic, $url, $notes, $page_text ) {
        $existing_slugs = implode( ', ', array_map( 'basename', glob( HC_PLUGIN_DIR . 'modules/*', GLOB_ONLYDIR ) ?: [] ) );

        return <<<PROMPT
Hesaplamaa.com WordPress eklentisi icin yeni bir hesap makinesi modulu uret.

KONU:
{$topic}

URL:
{$url}

OKUNABILEN SAYFA METNI:
{$page_text}

EK NOTLAR / FORMUL KAYNAKLARI:
{$notes}

MEVCUT SLUG'LAR:
{$existing_slugs}

ZORUNLU KURALLAR:
- Yanit sadece gecerli JSON olsun; markdown, aciklama veya kod blogu kullanma.
- Tum metinler Turkce olsun.
- Yalnizca SI birimleri kullan. inch, feet, pound, lbs, Fahrenheit gibi imperial birimleri koda, etikete, placeholder'a veya yoruma yazma.
- Para gerekiyorsa TL ve ₺ kullan.
- Hesaplama tamamen istemci tarafinda saf JavaScript ile yapilsin. Sunucu istegi, fetch, XMLHttpRequest veya harici kutuphane kullanma.
- PHP sadece HTML render etsin, script/style enqueue etsin.
- Mevcut slug'lardan birini kullanma.
- Slug kucuk harfli ve tireli olsun.
- Shortcode slug'in tireleri alt cizgiye cevrilmis haliyle [hc_slug] formatinda olsun.
- Class prefix .hc-{slug}- olsun.
- CSS icinde @media (max-width: 480px) olsun.
- calculator.js icinde ana fonksiyon hc{PascalCase}Hesapla() olsun.
- Eksik veya gecersiz giriste alert() ile Turkce uyari ver.
- Sonucu .hc-result div'ine yaz ve visible class'i ekle.
- Sayilari toLocaleString('tr-TR') ile formatla.
- Hesaplama formulu belirsizse module.needs_review true yap ve module.review_note alaninda neyin eksik oldugunu soyle; yine de en guvenli genel taslagi uretme, dosyaları uret ama kaynaksiz iddiali formül yazma.

JSON SEMASI:
{
  "module": {
    "name": "Turkce modul adi",
    "desc": "Bir cumlelik aciklama",
    "slug": "kisa-tireli-slug",
    "path": "modules/kisa-tireli-slug/",
    "shortcode": "[hc_kisa_tireli_slug]",
    "source_url": "{$url}",
    "formula_source_url": "Varsa kaynak URL",
    "needs_review": false,
    "review_note": ""
  },
  "files": {
    "meta_json": "{...}",
    "calculator_php": "<?php ...",
    "calculator_js": "function ...",
    "calculator_css": ".hc-slug-..."
  }
}
PROMPT;
    }

    private function get_payload_from_request() {
        $raw = wp_unslash( $_POST['payload'] ?? '' );
        $data = json_decode( $raw, true );

        return is_array( $data ) ? $this->normalize_preview_data( $data ) : [];
    }

    private function normalize_preview_data( $data ) {
        $module = isset( $data['module'] ) && is_array( $data['module'] ) ? $data['module'] : [];
        $files  = isset( $data['files'] ) && is_array( $data['files'] ) ? $data['files'] : [];
        $slug   = $this->sanitize_module_slug( $module['slug'] ?? '' );

        $module['name']               = sanitize_text_field( $module['name'] ?? '' );
        $module['desc']               = sanitize_text_field( $module['desc'] ?? '' );
        $module['slug']               = $slug;
        $module['path']               = $slug ? 'modules/' . $slug . '/' : '';
        $module['shortcode']          = '[hc_' . str_replace( '-', '_', $slug ) . ']';
        $module['source_url']         = esc_url_raw( $module['source_url'] ?? '' );
        $module['formula_source_url'] = esc_url_raw( $module['formula_source_url'] ?? '' );
        $module['needs_review']       = ! empty( $module['needs_review'] );
        $module['review_note']        = sanitize_textarea_field( $module['review_note'] ?? '' );

        return [
            'module' => $module,
            'files'  => [
                'meta_json'      => $this->normalize_newlines( $files['meta_json'] ?? '' ),
                'calculator_php' => $this->normalize_newlines( $files['calculator_php'] ?? '' ),
                'calculator_js'  => $this->normalize_newlines( $files['calculator_js'] ?? '' ),
                'calculator_css' => $this->normalize_newlines( $files['calculator_css'] ?? '' ),
            ],
        ];
    }

    private function validate_module_payload( $data, $require_new_slug ) {
        if ( empty( $data['module']['slug'] ) || ! preg_match( '/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $data['module']['slug'] ) ) {
            return new WP_Error( 'bad_slug', 'Slug geçersiz. Sadece küçük harf, rakam ve tire kullanılabilir.' );
        }

        $slug       = $data['module']['slug'];
        $underscore = str_replace( '-', '_', $slug );

        if ( $require_new_slug && file_exists( HC_PLUGIN_DIR . 'modules/' . $slug ) ) {
            return new WP_Error( 'exists', 'Bu slug ile modül zaten var. Mevcut modüllerin üzerine yazılamaz.' );
        }

        foreach ( [ 'meta_json', 'calculator_php', 'calculator_js', 'calculator_css' ] as $key ) {
            if ( empty( $data['files'][ $key ] ) ) {
                return new WP_Error( 'missing_file', $key . ' içeriği eksik.' );
            }
        }

        $meta = json_decode( $data['files']['meta_json'], true );
        if ( ! is_array( $meta ) || empty( $meta['name'] ) || empty( $meta['desc'] ) || ( $meta['shortcode'] ?? '' ) !== $data['module']['shortcode'] ) {
            return new WP_Error( 'bad_meta', 'meta.json geçersiz veya shortcode slug ile uyumsuz.' );
        }

        if ( false === strpos( $data['files']['calculator_php'], 'function hc_render_' . $underscore ) ) {
            return new WP_Error( 'bad_php', 'calculator.php render fonksiyonu beklenen isimde değil.' );
        }

        if ( false === strpos( $data['files']['calculator_php'], "modules/{$slug}/calculator.js" ) || false === strpos( $data['files']['calculator_php'], "modules/{$slug}/calculator.css" ) ) {
            return new WP_Error( 'bad_php_assets', 'calculator.php kendi modül JS/CSS dosyalarını enqueue etmeli.' );
        }

        $blocked_php = '/\b(eval|exec|shell_exec|system|passthru|proc_open|popen|curl_exec|wp_remote_post|wp_remote_get|file_put_contents|fopen|unlink|rename|copy|require|include)\b/i';
        if ( preg_match( $blocked_php, $data['files']['calculator_php'] ) ) {
            return new WP_Error( 'unsafe_php', 'calculator.php içinde izin verilmeyen PHP işlemi var.' );
        }

        $blocked_js = '/\b(fetch|XMLHttpRequest|eval|sendBeacon)\b|new\s+Function\b|\.ajax\s*\(/i';
        if ( preg_match( $blocked_js, $data['files']['calculator_js'] ) ) {
            return new WP_Error( 'unsafe_js', 'calculator.js içinde sunucu isteği veya güvensiz JS kullanımı var.' );
        }

        if ( false === strpos( $data['files']['calculator_js'], "toLocaleString('tr-TR'" ) && false === strpos( $data['files']['calculator_js'], 'toLocaleString("tr-TR"' ) ) {
            return new WP_Error( 'bad_js_format', 'calculator.js Türkçe sayı formatı için toLocaleString(\'tr-TR\') kullanmalı.' );
        }

        if ( preg_match( '/(@import|url\s*\()/i', $data['files']['calculator_css'] ) || false === strpos( $data['files']['calculator_css'], '.hc-' . $slug . '-' ) || false === strpos( $data['files']['calculator_css'], '@media (max-width: 480px)' ) ) {
            return new WP_Error( 'bad_css', 'calculator.css modül prefixi ve responsive kuralı ile uyumlu değil.' );
        }

        return true;
    }

    private function sanitize_module_slug( $slug ) {
        $slug = sanitize_title( $slug );
        $slug = preg_replace( '/[^a-z0-9-]/', '', $slug );
        $slug = trim( preg_replace( '/-+/', '-', $slug ), '-' );

        return $slug;
    }

    private function decode_json_response( $result ) {
        $clean = preg_replace( '/^```(?:json)?\s*/i', '', trim( $result ) );
        $clean = preg_replace( '/\s*```$/', '', $clean );

        return json_decode( $clean, true );
    }

    private function normalize_newlines( $text ) {
        $text = str_replace( [ "\r\n", "\r" ], "\n", (string) $text );

        return trim( $text ) . "\n";
    }
}
