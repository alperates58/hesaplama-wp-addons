<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HC_AI_Bulk_Generator {

    const MAX_QUEUE_ITEMS = 1000;
    const MAX_QUEUE_TITLE_LENGTH = 200;
    const MAX_QUEUE_MESSAGE_LENGTH = 500;

    public function __construct() {
        add_action( 'wp_ajax_hc_save_bot_settings', [ $this, 'ajax_save_bot_settings' ] );
        add_action( 'wp_ajax_hc_generate_and_push', [ $this, 'ajax_generate_and_push' ] );
        add_action( 'wp_ajax_hc_bulk_save_queue', [ $this, 'ajax_save_queue' ] );
    }

    public static function render_bulk_generator_tab() {
        $ai_provider = get_option('hc_ai_provider', 'deepseek');
        $api_key = get_option('hc_gemini_api_key', '');
        $gemini_model = get_option('hc_gemini_model', 'deepseek-v4-flash');
        $serper_key = get_option('hc_serper_api_key', '');
        
        $gh_settings = get_option('hc_github_settings', []);
        $gh_repo = isset($gh_settings['repo']) ? $gh_settings['repo'] : get_option('hc_bot_gh_repo', '');
        $gh_branch = isset($gh_settings['branch']) ? $gh_settings['branch'] : get_option('hc_bot_gh_branch', 'main');
        $gh_token = isset($gh_settings['token']) ? $gh_settings['token'] : get_option('hc_bot_gh_token', '');
        
        $queue = get_option('hc_bulk_queue', []);
        if(!is_array($queue)) $queue = [];
        ?>
        <div class="hc-card">
            <div class="hc-card-head">
                <div>
                    <h2>Toplu Modül Üretici (Hibrit AI)</h2>
                    <p class="hc-card-copy">DeepSeek/Gemini ve Serper API ile internet verisini çekerek binlerce başlığı hatasız kodlar.</p>
                </div>
            </div>

            <div class="hc-field-grid">
                <div class="hc-field-card">
                    <label for="hc_ai_provider"><strong>Yapay Zeka Sağlayıcı</strong></label>
                    <select id="hc_ai_provider" class="large-text">
                        <option value="deepseek" <?php selected($ai_provider, 'deepseek'); ?>>DeepSeek API (Önerilen)</option>
                        <option value="gemini" <?php selected($ai_provider, 'gemini'); ?>>Gemini API</option>
                    </select>
                </div>
                <div class="hc-field-card">
                    <label for="hc_api_key"><strong>AI API Anahtarı</strong></label>
                    <input type="password" id="hc_api_key" value="<?php echo esc_attr($api_key); ?>" class="large-text" placeholder="sk-...">
                </div>
                <div class="hc-field-card">
                    <label for="hc_gemini_model"><strong>AI Model Adı</strong></label>
                    <input type="text" id="hc_gemini_model" value="<?php echo esc_attr($gemini_model); ?>" class="large-text" list="hc-ai-model-options">
                    <datalist id="hc-ai-model-options">
                        <option value="deepseek-v4-flash"></option>
                        <option value="deepseek-v4-pro"></option>
                        <option value="gemini-2.5-flash"></option>
                        <option value="gemini-2.5-pro"></option>
                    </datalist>
                    <p class="description">DeepSeek için: deepseek-v4-flash veya deepseek-v4-pro | Gemini için: gemini-2.5-flash</p>
                </div>
                <div class="hc-field-card" style="background:#f0faeb; border:1px solid #c3e6cb;">
                    <label for="hc_serper_key"><strong>Serper.dev API Anahtarı (İsteğe Bağlı)</strong></label>
                    <input type="password" id="hc_serper_key" value="<?php echo esc_attr($serper_key); ?>" class="large-text">
                    <p class="description">Girerseniz, yapay zekaya güncel internet sonuçlarını (formülleri) göndeririz.</p>
                </div>
                <div class="hc-field-card">
                    <label for="hc_gh_repo"><strong>GitHub Repo</strong></label>
                    <input type="text" id="hc_gh_repo" value="<?php echo esc_attr($gh_repo); ?>" class="large-text" placeholder="kullanici/repo">
                </div>
                <div class="hc-field-card">
                    <label for="hc_gh_branch"><strong>GitHub Branch</strong></label>
                    <input type="text" id="hc_gh_branch" value="<?php echo esc_attr($gh_branch); ?>" class="large-text" placeholder="main">
                </div>
                <div class="hc-field-card">
                    <label for="hc_gh_token"><strong>GitHub Token (Opsiyonel)</strong></label>
                    <input type="password" id="hc_gh_token" value="<?php echo esc_attr($gh_token); ?>" class="large-text">
                    <p class="description">Boş bırakılırsa GitHub'a değil, direkt locale kaydeder.</p>
                </div>
            </div>

            <div class="hc-form-group" style="margin-top:15px;">
                <label for="hc_wait_time"><strong>Modüller Arası Bekleme Süresi (Saniye)</strong></label>
                <input type="number" id="hc_wait_time" value="5" min="2" max="60" style="width:100px;">
                <button type="button" class="button" onclick="saveBotSettings()" style="margin-left:10px;">Ayarları Kaydet</button>
            </div>
        </div>

        <div class="hc-card">
            <div class="hc-card-head">
                <h2>1. Kuyruğa Başlık Ekle</h2>
            </div>
            <div class="hc-field-grid">
                <div class="hc-field-card" style="grid-column: span 2;">
                    <label><strong>Metin Belgesi (.txt) Yükle</strong></label>
                    <input type="file" id="hc_file_upload" accept=".txt" class="large-text" style="padding: 5px;">
                    <p class="description">İçindeki her satır bir başlık olarak listeye eklenir.</p>
                </div>
            </div>
            <div class="hc-form-group" style="margin-top:15px;">
                <label><strong>Veya Manuel Ekle (Her satıra bir tane)</strong></label>
                <textarea id="hc_titles_input" rows="5" class="large-text" placeholder="Örn: Vücut Kitle İndeksi Hesaplama"></textarea>
            </div>
            <button type="button" class="button button-secondary" onclick="addItemsToQueue()">Kuyruğa Ekle / Birleştir</button>
        </div>

        <div class="hc-card">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
                <h2 style="margin:0;">2. Üretim Kuyruğu</h2>
                <div>
                    <button type="button" class="button button-secondary" onclick="removeSelected()">Seçilileri Sil</button>
                    <button type="button" class="button button-secondary" onclick="prioritizeSelected()">Seçilileri Öne Al</button>
                    <button type="button" class="button button-secondary" onclick="clearQueue()">Tümünü Temizle</button>
                </div>
            </div>

            <div class="hc-table-wrap" style="max-height: 400px; overflow-y: auto;">
                <table class="wp-list-table widefat striped">
                    <thead>
                        <tr>
                            <th style="width:5%"><input type="checkbox" id="cb-select-all" onclick="toggleAllCb(this)"></th>
                            <th style="width:60%">Modül Başlığı</th>
                            <th style="width:35%">Durum</th>
                        </tr>
                    </thead>
                    <tbody id="queue-tbody">
                        <!-- JS ile doldurulacak -->
                    </tbody>
                </table>
            </div>

            <div style="margin-top:20px; display:flex; gap:15px; align-items:center;">
                <button id="start-btn" class="button button-primary button-hero" onclick="startQueue()">🚀 Seçilileri/Bekleyenleri Üret</button>
                <button id="stop-btn" class="button button-secondary button-hero" style="display:none;" onclick="stopQueue()">Durdur</button>
                <span id="queue-status-text" style="font-weight:bold;"></span>
            </div>
        </div>

        <div class="hc-card">
            <h2>İşlem Logu</h2>
            <div id="log-container" style="background:#1e1e1e; color:#4CAF50; padding:15px; height:200px; overflow-y:auto; font-family:monospace; border-radius:4px;"></div>
        </div>

        <script>
        let isRunning = false;
        let queue = <?php echo wp_json_encode($queue, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;

        function createBadge(label, backgroundColor) {
            const span = document.createElement('span');
            span.className = 'hc-inline-badge';
            span.style.background = backgroundColor;
            span.style.color = '#fff';
            span.textContent = label;
            return span;
        }
        
        function renderTable() {
            const tbody = document.getElementById('queue-tbody');
            tbody.innerHTML = '';
            if(queue.length === 0) {
                tbody.innerHTML = '<tr><td colspan="3">Kuyruk boş.</td></tr>';
                return;
            }
            queue.forEach((item, index) => {
                const row = document.createElement('tr');
                const checkboxCell = document.createElement('td');
                const titleCell = document.createElement('td');
                const statusCell = document.createElement('td');
                const checkbox = document.createElement('input');
                const titleStrong = document.createElement('strong');

                checkbox.type = 'checkbox';
                checkbox.className = 'cb-item';
                checkbox.setAttribute('data-index', index);
                checkbox.disabled = item.status === 'success';

                titleStrong.textContent = item.title || '';

                checkboxCell.appendChild(checkbox);
                titleCell.appendChild(titleStrong);

                if(item.status === 'pending') {
                    statusCell.appendChild(createBadge('Bekliyor', '#ff9800'));
                } else if(item.status === 'success') {
                    statusCell.appendChild(createBadge('Tamamlandı', '#4CAF50'));
                } else {
                    statusCell.appendChild(createBadge('Hata: ' + (item.message || 'Bilinmeyen hata'), '#f44336'));
                }

                row.appendChild(checkboxCell);
                row.appendChild(titleCell);
                row.appendChild(statusCell);
                tbody.appendChild(row);
            });
            saveQueueToDb();
        }

        document.getElementById('hc_file_upload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if(!file) return;
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('hc_titles_input').value += '\n' + e.target.result;
                document.getElementById('hc_file_upload').value = '';
            };
            reader.readAsText(file);
        });

        function addItemsToQueue() {
            const text = document.getElementById('hc_titles_input').value;
            const lines = text.split('\n').map(t => t.trim()).filter(t => t);
            let added = 0;
            lines.forEach(title => {
                if(!queue.find(q => q.title.toLowerCase() === title.toLowerCase())) {
                    queue.push({ title: title, status: 'pending', message: '' });
                    added++;
                }
            });
            document.getElementById('hc_titles_input').value = '';
            renderTable();
            alert(added + ' adet yeni başlık eklendi!');
        }

        function toggleAllCb(el) {
            document.querySelectorAll('.cb-item:not([disabled])').forEach(cb => cb.checked = el.checked);
        }

        function getSelectedIndices() {
            return Array.from(document.querySelectorAll('.cb-item:checked')).map(cb => parseInt(cb.getAttribute('data-index')));
        }

        function removeSelected() {
            const indices = getSelectedIndices().sort((a,b) => b-a);
            if(indices.length === 0) return alert('Seçili öge yok.');
            indices.forEach(idx => queue.splice(idx, 1));
            document.getElementById('cb-select-all').checked = false;
            renderTable();
        }

        function prioritizeSelected() {
            const indices = getSelectedIndices();
            if(indices.length === 0) return alert('Seçili öge yok.');
            const selectedItems = indices.map(idx => queue[idx]);
            const otherItems = queue.filter((_, idx) => !indices.includes(idx));
            queue = [...selectedItems, ...otherItems];
            document.getElementById('cb-select-all').checked = false;
            renderTable();
        }

        function clearQueue() {
            if(!confirm('Tüm kuyruk silinecek. Emin misiniz?')) return;
            queue = [];
            renderTable();
        }

        function saveBotSettings() {
            jQuery.post(hcAdmin.ajaxurl, {
                action: 'hc_save_bot_settings',
                nonce: hcAdmin.nonce,
                ai_provider: document.getElementById('hc_ai_provider').value,
                api_key: document.getElementById('hc_api_key').value,
                gemini_model: document.getElementById('hc_gemini_model').value,
                serper_key: document.getElementById('hc_serper_key').value,
                repo: document.getElementById('hc_gh_repo').value,
                branch: document.getElementById('hc_gh_branch').value,
                token: document.getElementById('hc_gh_token').value
            }, function() { alert('Ayarlar Kaydedildi!'); });
        }

        function saveQueueToDb() {
            jQuery.post(hcAdmin.ajaxurl, { action: 'hc_bulk_save_queue', nonce: hcAdmin.nonce, queue: JSON.stringify(queue) });
        }

        function logMsg(msg) {
            const line = document.createElement('div');
            line.textContent = '[' + new Date().toLocaleTimeString() + '] ' + msg;
            const container = document.getElementById('log-container');
            container.prepend(line);
        }

        function startQueue() {
            isRunning = true;
            document.getElementById('start-btn').style.display = 'none';
            document.getElementById('stop-btn').style.display = 'inline-block';
            logMsg('🚀 İşlem başlatıldı.');
            processNext();
        }

        function stopQueue() {
            isRunning = false;
            document.getElementById('start-btn').style.display = 'inline-block';
            document.getElementById('stop-btn').style.display = 'none';
            document.getElementById('queue-status-text').innerText = 'Durduruldu.';
            logMsg('⏹️ İşlem durduruldu.');
        }

        function processNext() {
            if(!isRunning) return;

            const selectedIndices = getSelectedIndices();
            let targetIndex = -1;

            if(selectedIndices.length > 0) {
                targetIndex = selectedIndices.find(idx => queue[idx].status === 'pending');
            }
            if(targetIndex === -1 || targetIndex === undefined) {
                targetIndex = queue.findIndex(q => q.status === 'pending' || q.status === 'error');
            }

            if(targetIndex === -1) {
                stopQueue();
                document.getElementById('queue-status-text').innerText = 'Kuyruktaki tüm işlemler tamamlandı!';
                logMsg('✅ Tüm liste bitirildi.');
                return;
            }

            const item = queue[targetIndex];
            document.getElementById('queue-status-text').innerText = 'İşleniyor: ' + item.title;
            logMsg('🔍 Üretiliyor: ' + item.title);

            jQuery.ajax({
                url: hcAdmin.ajaxurl, 
                type: 'POST', 
                data: { action: 'hc_generate_and_push', nonce: hcAdmin.nonce, title: item.title },
                success: function(res) {
                    if(res.success) {
                        queue[targetIndex].status = 'success';
                        logMsg('✅ Başarılı: ' + item.title);
                        const cb = document.querySelector(`.cb-item[data-index="${targetIndex}"]`);
                        if(cb) cb.checked = false;
                    } else {
                        const errorText = (res.data || '').toLowerCase();
                        if (errorText.includes('high demand') || errorText.includes('quota') || errorText.includes('429') || errorText.includes('timed out') || errorText.includes('cURL error 28'.toLowerCase())) {
                            logMsg('⚠️ API Yoğun/Kota: ' + res.data + ' | 15 sn sonra denenecek...');
                            queue[targetIndex].status = 'pending'; 
                            renderTable();
                            setTimeout(processNext, 15000);
                            return;
                        }

                        queue[targetIndex].status = 'error';
                        queue[targetIndex].message = res.data;
                        logMsg('❌ Hata (' + item.title + '): ' + res.data);
                    }
                    renderTable();
                    
                    const waitTime = parseInt(document.getElementById('hc_wait_time').value) || 5;
                    logMsg(`⏳ ${waitTime} saniye bekleniyor...`);
                    setTimeout(processNext, waitTime * 1000);
                },
                error: function() { 
                    queue[targetIndex].status = 'error';
                    queue[targetIndex].message = 'Sunucu hatası.';
                    logMsg('❌ Sunucu Hatası: ' + item.title); 
                    renderTable();
                    const waitTime = parseInt(document.getElementById('hc_wait_time').value) || 5;
                    setTimeout(processNext, waitTime * 1000); 
                }
            });
        }

        document.addEventListener('DOMContentLoaded', renderTable);
        </script>
        <?php
    }

    public function ajax_save_bot_settings() {
        if ( ! current_user_can( 'manage_options' ) ) wp_send_json_error();
        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) wp_send_json_error();

        $ai_provider = sanitize_text_field( wp_unslash( $_POST['ai_provider'] ?? 'deepseek' ) );
        if ( ! in_array( $ai_provider, [ 'deepseek', 'gemini' ], true ) ) {
            $ai_provider = 'deepseek';
        }

        update_option('hc_ai_provider', $ai_provider);
        update_option('hc_gemini_api_key', sanitize_text_field( wp_unslash( $_POST['api_key'] ?? '' ) ));
        update_option('hc_gemini_model', $this->sanitize_model_name( wp_unslash( $_POST['gemini_model'] ?? '' ) ));
        update_option('hc_serper_api_key', sanitize_text_field( wp_unslash( $_POST['serper_key'] ?? '' ) ));
        update_option('hc_bot_gh_repo', sanitize_text_field( wp_unslash( $_POST['repo'] ?? '' ) ));
        update_option('hc_bot_gh_branch', sanitize_text_field( wp_unslash( $_POST['branch'] ?? 'main' ) ));
        update_option('hc_bot_gh_token', sanitize_text_field( wp_unslash( $_POST['token'] ?? '' ) ));
        wp_send_json_success();
    }

    public function ajax_save_queue() {
        if ( ! current_user_can( 'manage_options' ) ) wp_send_json_error();
        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) wp_send_json_error();
        
        $queue_raw = wp_unslash($_POST['queue'] ?? '[]');
        $queue = json_decode($queue_raw, true);
        if ( ! is_array( $queue ) ) {
            wp_send_json_error( 'Kuyruk verisi gecersiz.' );
        }

        $sanitized_queue = $this->sanitize_queue_items( $queue );
        update_option('hc_bulk_queue', $sanitized_queue, false);
        wp_send_json_success();
    }

    public function ajax_generate_and_push() {
        if ( ! current_user_can( 'manage_options' ) ) wp_send_json_error();
        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) wp_send_json_error();

        $title = sanitize_text_field( wp_unslash( $_POST['title'] ?? '' ) );
        $ai_provider = get_option('hc_ai_provider', 'deepseek');
        $api_key = get_option('hc_gemini_api_key');
        $ai_model = $this->sanitize_model_name( get_option('hc_gemini_model', 'deepseek-v4-flash') );
        $serper_key = get_option('hc_serper_api_key', '');
        
        $gh_settings = get_option('hc_github_settings', []);
        $gh_repo = isset($gh_settings['repo']) ? $gh_settings['repo'] : get_option('hc_bot_gh_repo', '');
        $gh_branch = isset($gh_settings['branch']) ? $gh_settings['branch'] : get_option('hc_bot_gh_branch', 'main');
        $gh_token = isset($gh_settings['token']) ? $gh_settings['token'] : get_option('hc_bot_gh_token', '');

        if(!$title || !$api_key) {
            wp_send_json_error('API Key eksik. Başlık ve API Key zorunludur.');
        }

        $slug = $this->sanitize_module_slug( $title );
        if ( ! $slug ) {
            wp_send_json_error( 'Basliktan gecerli bir slug olusturulamadi.' );
        }
        $slug_under = str_replace('-', '_', $slug);

        // 1. Serper API Arama
        $search_context = "";
        if (!empty($serper_key)) {
            $serper_res = wp_remote_post("https://google.serper.dev/search", [
                'headers' => [
                    'X-API-KEY' => $serper_key,
                    'Content-Type' => 'application/json'
                ],
                'body' => wp_json_encode(['q' => $title . " hesaplama formülü", 'gl' => 'tr', 'hl' => 'tr']),
                'timeout' => 15
            ]);

            if (!is_wp_error($serper_res) && wp_remote_retrieve_response_code($serper_res) == 200) {
                $serper_data = json_decode(wp_remote_retrieve_body($serper_res), true);
                if (!empty($serper_data['organic'])) {
                    $search_context = "GÜNCEL İNTERNET ARAMA SONUÇLARI (Bu formülleri/bilgileri dikkate al):\n";
                    foreach (array_slice($serper_data['organic'], 0, 3) as $result) {
                        $search_context .= "- " . ($result['snippet'] ?? '') . "\n";
                    }
                }
            }
        }

        // 2. Prompt Hazırlığı
        $prompt = "Sen uzman bir WordPress eklenti geliştiricisisin. Görev: '$title' konusu için bir hesaplama modülü kodla. SADECE geçerli bir JSON dön. 
ÖNEMLİ KURALLAR:
1. JSON string değerleri içine yazacağın kodlarda satır sonlarını gerçek yeni satır olarak değil, mutlaka \\n olarak (escaped) yaz!
2. calculator.php dosyası KESİNLİKLE '<?php' ile başlamalı ve SADECE 'function hc_render_{$slug_under}($atts)' fonksiyonunu içermelidir. Fonksiyon dışında ASLA 'echo' veya düz metin (JSON vb) KULLANMA!
3. Sadece SI birimleri kullan (kg, m, vb), tüm dil Türkçe, [hc_$slug_under] shortcode'unu kullan.
4. Placeholder yorum, sahte kod, TODO, 'buraya yaz', 'örnek', '...' ve boş hesap makinesi üretme. Form alanları, hesaplama formülü, sonuç alanı ve çalışan JS zorunludur.
5. calculator.js içinde ana fonksiyon gerçek bir hesap yapmalı; sadece iskelet veya yorum döndürme.
";

        if ($search_context) {
            $prompt .= "\n" . $search_context . "\n\n";
        }

        $prompt .= "Format:
{
  \"meta.json\": \"{\\\"name\\\":\\\"$title\\\",\\\"desc\\\":\\\"Aciklama buraya\\\",\\\"shortcode\\\":\\\"[hc_$slug_under]\\\"}\",
  \"calculator.php\": \"<?php\\nif (!defined('ABSPATH')) exit;\\n\\nfunction hc_render_{$slug_under}( \\$atts ) {\\n    // GERCEK PHP ve HTML KODLARINI BURAYA YAZ\\n}\\n\",
  \"calculator.js\": \"// GERCEK JS KODLARINI BURAYA YAZ (Örn: function hcHesapla() { ... })\",
  \"calculator.css\": \"/* GERCEK CSS KODLARINI BURAYA YAZ */\"
}
ÖNEMLİ: Format örneğindeki yorum satırları ve '...' olan yerleri kendi yazacağın ÇALIŞAN, GERÇEK kodlarla doldur! Sadece örnekteki gibi bırakma!";

        $raw_text = $this->request_ai_generation( $ai_provider, $ai_model, $api_key, $prompt );
        if ( is_wp_error( $raw_text ) ) {
            wp_send_json_error( $raw_text->get_error_message() );
        }

        // 4. JSON Temizleme ve Kaydetme
        $clean_text = preg_replace( '/^```(?:json)?\s*/i', '', trim( $raw_text ) );
        $clean_text = preg_replace( '/\s*```$/', '', $clean_text );

        $files = json_decode($clean_text, true);
        if(!$files) {
            wp_send_json_error('JSON dönüştürülemedi. Ham Yanıt: ' . substr($clean_text, 0, 500));
        }

        $normalized_files = $this->normalize_generated_files( $files, $title, $slug );
        $validation_errors = $this->get_generated_file_errors( $normalized_files, $slug );
        if ( ! empty( $validation_errors ) ) {
            $repair_files = $this->attempt_file_repair( $ai_provider, $ai_model, $api_key, $title, $slug, $normalized_files, $validation_errors );
            if ( is_wp_error( $repair_files ) ) {
                wp_send_json_error( implode( ' | ', $validation_errors ) );
            }

            $normalized_files = $repair_files;
            $validation_errors = $this->get_generated_file_errors( $normalized_files, $slug );
            if ( ! empty( $validation_errors ) ) {
                wp_send_json_error( implode( ' | ', $validation_errors ) );
            }
        }

        $github_files = [
            "modules/{$slug}/meta.json"      => $normalized_files['meta.json'],
            "modules/{$slug}/calculator.php" => $normalized_files['calculator.php'],
            "modules/{$slug}/calculator.js"  => $normalized_files['calculator.js'],
            "modules/{$slug}/calculator.css" => $normalized_files['calculator.css']
        ];

        $message = "feat: {$title} modülü otomatik eklendi\n\nShortcode: [hc_{$slug_under}]";
        
        if ( !empty($gh_token) && !empty($gh_repo) ) {
            $gh_result = $this->github_commit($gh_repo, $gh_branch, $gh_token, $github_files, $message);
            if (is_wp_error($gh_result)) {
                wp_send_json_error('GitHub Hatası: ' . $gh_result->get_error_message());
            }
            wp_send_json_success('GitHub a başarıyla yüklendi!');
        } else {
            $module_dir = HC_PLUGIN_DIR . 'modules/' . $slug;
            if ( file_exists( $module_dir ) ) {
                wp_send_json_error( 'Bu slug ile modul zaten var. Mevcut modullerin uzerine yazilamaz.' );
            }
            if ( ! wp_mkdir_p( $module_dir ) ) {
                wp_send_json_error( 'Modul klasoru olusturulamadi.' );
            }

            foreach($normalized_files as $filename => $content) {
                if(!empty($content)) {
                    $written = file_put_contents($module_dir . '/' . sanitize_file_name($filename), $content);
                    if ( false === $written ) {
                        wp_send_json_error( sanitize_file_name($filename) . ' yazilamadi.' );
                    }
                }
            }
            wp_send_json_success('Lokal Klasöre Kaydedildi!');
        }
    }

    private function sanitize_model_name( $model ) {
        $model = sanitize_text_field( (string) $model );
        return $model ? $model : 'deepseek-v4-flash';
    }

    private function request_ai_generation( $ai_provider, $ai_model, $api_key, $prompt ) {
        if ( 'deepseek' === $ai_provider ) {
            $payload = [
                'model' => $ai_model,
                'messages' => [['role' => 'user', 'content' => $prompt]],
                'response_format' => ['type' => 'json_object']
            ];

            $response = wp_remote_post("https://api.deepseek.com/chat/completions", [
                'timeout' => 150,
                'headers' => [
                    'Authorization' => 'Bearer ' . $api_key,
                    'Content-Type'  => 'application/json'
                ],
                'body' => wp_json_encode($payload)
            ]);

            if ( is_wp_error( $response ) ) {
                return new WP_Error( 'deepseek_connection', 'DeepSeek Bağlantı Hatası: ' . $response->get_error_message() );
            }

            $body = json_decode( wp_remote_retrieve_body( $response ), true );
            if ( isset( $body['error'] ) ) {
                return new WP_Error( 'deepseek_api', 'DeepSeek API Hatası: ' . ( $body['error']['message'] ?? wp_json_encode( $body['error'] ) ) );
            }

            if ( empty( $body['choices'][0]['message']['content'] ) ) {
                return new WP_Error( 'deepseek_empty', 'DeepSeek yanıtı boş. Ham Yanıt: ' . wp_json_encode( $body ) );
            }

            return $body['choices'][0]['message']['content'];
        }

        $payload = [
            'contents' => [['parts' => [['text' => $prompt]]]],
            'generationConfig' => ['responseMimeType' => 'application/json']
        ];

        $response = wp_remote_post("https://generativelanguage.googleapis.com/v1beta/models/{$ai_model}:generateContent?key={$api_key}", [
            'timeout' => 120,
            'headers' => ['Content-Type' => 'application/json'],
            'body'    => wp_json_encode($payload)
        ]);

        if ( is_wp_error( $response ) ) {
            return new WP_Error( 'gemini_connection', 'Gemini Bağlantı Hatası: ' . $response->get_error_message() );
        }

        $body = json_decode( wp_remote_retrieve_body( $response ), true );
        if ( isset( $body['error'] ) ) {
            return new WP_Error( 'gemini_api', 'Gemini API Hatası: ' . ( $body['error']['message'] ?? wp_json_encode( $body['error'] ) ) );
        }

        if ( empty( $body['candidates'][0]['content']['parts'][0]['text'] ) ) {
            return new WP_Error( 'gemini_empty', 'API yanıtı boş. Ham Yanıt: ' . wp_json_encode( $body ) );
        }

        return $body['candidates'][0]['content']['parts'][0]['text'];
    }

    private function attempt_file_repair( $ai_provider, $ai_model, $api_key, $title, $slug, $files, $validation_errors ) {
        $repair_prompt = $this->build_repair_prompt( $title, $slug, $files, $validation_errors );
        $raw_text = $this->request_ai_generation( $ai_provider, $ai_model, $api_key, $repair_prompt );

        if ( is_wp_error( $raw_text ) ) {
            return $raw_text;
        }

        $clean_text = preg_replace( '/^```(?:json)?\s*/i', '', trim( $raw_text ) );
        $clean_text = preg_replace( '/\s*```$/', '', $clean_text );
        $repaired_files = json_decode( $clean_text, true );

        if ( ! is_array( $repaired_files ) ) {
            return new WP_Error( 'repair_json', 'Duzeltme yaniti gecersiz JSON dondu.' );
        }

        return $this->normalize_generated_files( $repaired_files, $title, $slug );
    }

    private function build_repair_prompt( $title, $slug, $files, $validation_errors ) {
        $slug_under = str_replace( '-', '_', $slug );
        $files_json = wp_json_encode( $files, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
        $error_lines = [];

        foreach ( (array) $validation_errors as $validation_error ) {
            $error_lines[] = '- ' . $validation_error;
        }

        $error_text = implode( "\n", $error_lines );

        return "Daha once uretilen WordPress hesaplama modulu gecersiz bulundu. Sadece gecerli JSON don ve tum dosyalari tam calisan hale getir.\n"
            . "Konu: {$title}\n"
            . "Slug: {$slug}\n"
            . "Shortcode: [hc_{$slug_under}]\n"
            . "Dogrulama hatalari:\n{$error_text}\n"
            . "Zorunlu: calculator.js gercek hesaplama yapmali, sonuc HTML icine yazilmali ve visible class'i eklenmeli. Bos iskelet, yorum veya TODO kullanma.\n"
            . "Zorunlu: calculator.js icinde sayi formatlama icin toLocaleString('tr-TR') kullan.\n"
            . "Zorunlu: calculator.php icinde modules/{$slug}/calculator.js ve modules/{$slug}/calculator.css enqueue edilmeli.\n"
            . "Zorunlu: calculator.css icinde .hc-{$slug}- prefixi ve @media (max-width: 480px) olmali.\n"
            . "Yalnizca SI birimleri ve Turkce kullan.\n"
            . "Mevcut gecersiz dosyalar JSON'u:\n{$files_json}\n"
            . "Yaniti su anahtarlarla don: meta.json, calculator.php, calculator.js, calculator.css";
    }

    private function sanitize_queue_items( $queue ) {
        $sanitized = [];

        foreach ( array_slice( $queue, 0, self::MAX_QUEUE_ITEMS ) as $item ) {
            if ( ! is_array( $item ) ) {
                continue;
            }

            $title = sanitize_text_field( $item['title'] ?? '' );
            $status = sanitize_key( $item['status'] ?? 'pending' );
            $message = sanitize_text_field( $item['message'] ?? '' );

            $title = function_exists( 'mb_substr' )
                ? mb_substr( $title, 0, self::MAX_QUEUE_TITLE_LENGTH, 'UTF-8' )
                : substr( $title, 0, self::MAX_QUEUE_TITLE_LENGTH );
            $message = function_exists( 'mb_substr' )
                ? mb_substr( $message, 0, self::MAX_QUEUE_MESSAGE_LENGTH, 'UTF-8' )
                : substr( $message, 0, self::MAX_QUEUE_MESSAGE_LENGTH );

            if ( '' === $title ) {
                continue;
            }

            if ( ! in_array( $status, [ 'pending', 'success', 'error' ], true ) ) {
                $status = 'pending';
            }

            $sanitized[] = [
                'title' => $title,
                'status' => $status,
                'message' => $message,
            ];
        }

        return $sanitized;
    }

    private function sanitize_module_slug( $slug ) {
        $slug = sanitize_title( $slug );
        $slug = preg_replace( '/[^a-z0-9-]/', '', $slug );
        $slug = trim( preg_replace( '/-+/', '-', $slug ), '-' );

        return $slug;
    }

    private function normalize_generated_files( $files, $title, $slug ) {
        $slug_under = str_replace( '-', '_', $slug );
        $normalized = [
            'meta.json' => $this->normalize_newlines( $files['meta.json'] ?? '' ),
            'calculator.php' => $this->normalize_newlines( $files['calculator.php'] ?? '' ),
            'calculator.js' => $this->normalize_newlines( $files['calculator.js'] ?? '' ),
            'calculator.css' => $this->normalize_newlines( $files['calculator.css'] ?? '' ),
        ];

        $meta = json_decode( $normalized['meta.json'], true );
        if ( ! is_array( $meta ) ) {
            $meta = [];
        }
        $meta['name'] = sanitize_text_field( $meta['name'] ?? $title );
        $meta['desc'] = sanitize_text_field( $meta['desc'] ?? ( $title . ' hesaplamasi yapar.' ) );
        $meta['shortcode'] = '[hc_' . $slug_under . ']';
        $normalized['meta.json'] = wp_json_encode( $meta, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . "\n";

        $expected_function = 'hc_render_' . $slug_under;
        if ( ! preg_match( '/function\s+' . preg_quote( $expected_function, '/' ) . '\s*\(/', $normalized['calculator.php'] ) ) {
            $normalized['calculator.php'] = preg_replace(
                '/function\s+[A-Za-z_\x80-\xff][A-Za-z0-9_\x80-\xff]*\s*\(/u',
                'function ' . $expected_function . '(',
                $normalized['calculator.php'],
                1
            );
        }

        $normalized['calculator.php'] = $this->normalize_calculator_php_file( $normalized['calculator.php'], $slug );
        $normalized['calculator.js'] = $this->normalize_calculator_js_file( $normalized['calculator.js'], $slug );
        $normalized['calculator.css'] = $this->normalize_calculator_css_file( $normalized['calculator.css'], $slug );

        return $normalized;
    }

    private function normalize_calculator_php_file( $calculator_php, $slug ) {
        $calculator_php = $this->normalize_calculator_asset_paths( $calculator_php, $slug );
        $calculator_php = $this->ensure_calculator_enqueues( $calculator_php, $slug );

        return $this->normalize_newlines( $calculator_php );
    }

    private function normalize_calculator_asset_paths( $calculator_php, $slug ) {
        $calculator_php = preg_replace(
            '#modules/[a-z0-9-]+/calculator\.(js|css)#',
            'modules/' . $slug . '/calculator.$1',
            $calculator_php
        );

        $calculator_php = preg_replace_callback(
            '/([\'"])([^\'"]*calculator\.(js|css))\1/i',
            function ( $matches ) use ( $slug ) {
                return $matches[1] . 'modules/' . $slug . '/calculator.' . strtolower( $matches[3] ) . $matches[1];
            },
            $calculator_php
        );

        return $calculator_php;
    }

    private function ensure_calculator_enqueues( $calculator_php, $slug ) {
        $script_block = "    wp_enqueue_script(\n        'hc-{$slug}',\n        HC_PLUGIN_URL . 'modules/{$slug}/calculator.js',\n        [], HC_VERSION, true\n    );\n";
        $style_block = "    wp_enqueue_style(\n        'hc-{$slug}-css',\n        HC_PLUGIN_URL . 'modules/{$slug}/calculator.css',\n        [ 'hesaplama-suite' ], HC_VERSION\n    );\n";

        if ( false === strpos( $calculator_php, "modules/{$slug}/calculator.js" ) ) {
            $calculator_php = preg_replace(
                '/(function\s+hc_render_[a-z0-9_]+\s*\([^)]*\)\s*\{\n?)/i',
                "$1" . $script_block,
                $calculator_php,
                1
            );
        }

        if ( false === strpos( $calculator_php, "modules/{$slug}/calculator.css" ) ) {
            $insertion = $script_block . $style_block;

            if ( false !== strpos( $calculator_php, $script_block ) ) {
                $calculator_php = str_replace( $script_block, $insertion, $calculator_php );
            } else {
                $calculator_php = preg_replace(
                    '/(function\s+hc_render_[a-z0-9_]+\s*\([^)]*\)\s*\{\n?)/i',
                    "$1" . $style_block,
                    $calculator_php,
                    1
                );
            }
        }

        return $calculator_php;
    }

    private function normalize_calculator_js_file( $calculator_js, $slug ) {
        if ( false === strpos( $calculator_js, "toLocaleString('tr-TR'" ) && false === strpos( $calculator_js, 'toLocaleString("tr-TR"' ) ) {
            $helper = "function hcFormatTrNumber(value) {\n    return Number(value).toLocaleString('tr-TR');\n}\n\n";
            $calculator_js = $helper . ltrim( $calculator_js );
        }

        if ( false === strpos( $calculator_js, 'visible' ) && preg_match( '/document\.getElementById\([\'"][^\'"]+-result[\'"]\)/', $calculator_js ) ) {
            $calculator_js .= "\nfunction hcEnsureResultVisible(resultElement) {\n    if (resultElement) {\n        resultElement.classList.add('visible');\n    }\n}\n";
        }

        return $this->normalize_newlines( $calculator_js );
    }

    private function normalize_calculator_css_file( $calculator_css, $slug ) {
        $calculator_css = preg_replace( '/@import\s+[^;]+;?/i', '', $calculator_css );
        $calculator_css = preg_replace( '/url\s*\([^)]*\)/i', 'none', $calculator_css );
        $calculator_css = trim( $calculator_css );

        if ( false === strpos( $calculator_css, '.hc-' . $slug . '-' ) ) {
            $calculator_css .= "\n\n.hc-{$slug}-panel {\n    display: grid;\n    gap: 12px;\n}\n\n.hc-{$slug}-summary {\n    font-weight: 600;\n}\n";
        }

        if ( false === strpos( $calculator_css, '@media (max-width: 480px)' ) ) {
            $calculator_css .= "\n\n@media (max-width: 480px) {\n    .hc-{$slug}-panel {\n        gap: 10px;\n    }\n\n    .hc-{$slug}-summary {\n        font-size: 14px;\n    }\n}\n";
        }

        return $this->normalize_newlines( $calculator_css );
    }

    private function validate_generated_files( $files, $slug ) {
        $errors = $this->get_generated_file_errors( $files, $slug );

        if ( ! empty( $errors ) ) {
            return new WP_Error( 'generated_files_invalid', $errors[0] );
        }

        return true;
    }

    private function get_generated_file_errors( $files, $slug ) {
        $errors = [];
        $required_keys = [ 'meta.json', 'calculator.php', 'calculator.js', 'calculator.css' ];

        foreach ( $required_keys as $key ) {
            if ( empty( $files[ $key ] ) ) {
                $errors[] = $key . ' icerigi eksik.';
            }
        }

        if ( ! empty( $errors ) ) {
            return $errors;
        }

        $meta = json_decode( $files['meta.json'], true );
        if ( ! is_array( $meta ) || empty( $meta['name'] ) || empty( $meta['desc'] ) || empty( $meta['shortcode'] ) ) {
            $errors[] = 'meta.json gecersiz.';
        }

        $expected_shortcode = '[hc_' . str_replace( '-', '_', $slug ) . ']';
        if ( is_array( $meta ) && $expected_shortcode !== ( $meta['shortcode'] ?? '' ) ) {
            $errors[] = 'meta.json shortcode slug ile uyumsuz.';
        }

        $expected_function = 'hc_render_' . str_replace( '-', '_', $slug );
        if ( ! preg_match( '/function\s+' . preg_quote( $expected_function, '/' ) . '\s*\(/', $files['calculator.php'] ) ) {
            $errors[] = 'calculator.php render fonksiyonu beklenen isimde degil.';
        }

        if ( false === strpos( $files['calculator.php'], "modules/{$slug}/calculator.js" ) || false === strpos( $files['calculator.php'], "modules/{$slug}/calculator.css" ) ) {
            $errors[] = 'calculator.php kendi modul JS/CSS dosyalarini enqueue etmeli.';
        }

        $blocked_php = '/\b(eval|exec|shell_exec|system|passthru|proc_open|popen|curl_exec|wp_remote_post|wp_remote_get|file_put_contents|fopen|unlink|rename|copy|require|include|base64_decode)\b/i';
        if ( preg_match( $blocked_php, $files['calculator.php'] ) ) {
            $errors[] = 'calculator.php icinde izin verilmeyen PHP islemi var.';
        }

        $placeholder_pattern = '/(TODO|ornek|örnek|buraya yaz|placeholder|\.{3}|GERCEK|CALISAN|ÇALIŞAN)/iu';
        if ( preg_match( $placeholder_pattern, $files['calculator.php'] ) || preg_match( $placeholder_pattern, $files['calculator.js'] ) || preg_match( $placeholder_pattern, $files['calculator.css'] ) ) {
            $errors[] = 'AI yaniti tamamlanmamis iskelet kod iceriyor.';
        }

        $blocked_js = '/\b(fetch|XMLHttpRequest|eval|sendBeacon)\b|new\s+Function\b|\.ajax\s*\(/i';
        if ( preg_match( $blocked_js, $files['calculator.js'] ) ) {
            $errors[] = 'calculator.js icinde sunucu istegi veya guvensiz JS kullanimi var.';
        }

        if ( false === strpos( $files['calculator.js'], 'function hc' ) || ( false === strpos( $files['calculator.js'], '.hc-result' ) && false === strpos( $files['calculator.js'], 'visible' ) ) ) {
            $errors[] = 'calculator.js calisan hesaplama ve sonuc gosterme mantigi icermiyor.';
        }

        if ( false === strpos( $files['calculator.js'], "toLocaleString('tr-TR'" ) && false === strpos( $files['calculator.js'], 'toLocaleString("tr-TR"' ) ) {
            $errors[] = 'calculator.js Turkce sayi formati icin toLocaleString(\'tr-TR\') kullanmali.';
        }

        if ( preg_match( '/(@import|url\s*\()/i', $files['calculator.css'] ) || false === strpos( $files['calculator.css'], '.hc-' . $slug . '-' ) || false === strpos( $files['calculator.css'], '@media (max-width: 480px)' ) ) {
            $errors[] = 'calculator.css modul prefixi ve responsive kurali ile uyumlu degil.';
        }

        return $errors;
    }

    private function normalize_newlines( $text ) {
        $text = str_replace( [ "\r\n", "\r" ], "\n", (string) $text );
        return trim( $text ) . "\n";
    }

    private function github_commit($repo, $branch, $token, $files, $message) {
        $repo_api = 'https://api.github.com/repos/' . str_replace('%2F', '/', rawurlencode($repo));
        $branch_enc = rawurlencode($branch);
        
        $headers = [
            'Authorization' => 'token ' . $token,
            'Content-Type'  => 'application/json',
            'User-Agent'    => 'hesaplama-bot'
        ];

        $ref_res = wp_remote_get("{$repo_api}/git/ref/heads/{$branch_enc}", ['headers' => $headers, 'timeout' => 15]);
        if (is_wp_error($ref_res)) return $ref_res;
        $ref_data = json_decode(wp_remote_retrieve_body($ref_res), true);
        $parent_sha = $ref_data['object']['sha'] ?? '';
        if (!$parent_sha) return new WP_Error('github_err', 'Branch ref bulunamadı.');

        $commit_res = wp_remote_get("{$repo_api}/git/commits/{$parent_sha}", ['headers' => $headers, 'timeout' => 15]);
        $commit_data = json_decode(wp_remote_retrieve_body($commit_res), true);
        $base_tree = $commit_data['tree']['sha'] ?? '';
        if (!$base_tree) return new WP_Error('github_err', 'Base tree bulunamadı.');

        $tree = [];
        foreach ($files as $path => $content) {
            if(empty($content)) continue;
            
            $exists_res = wp_remote_get("{$repo_api}/contents/" . str_replace('%2F', '/', rawurlencode($path)) . "?ref={$branch_enc}", ['headers' => $headers]);
            if (!is_wp_error($exists_res) && wp_remote_retrieve_response_code($exists_res) == 200) {
                return new WP_Error('github_err', "Dosya zaten var: $path");
            }

            $blob_res = wp_remote_post("{$repo_api}/git/blobs", [
                'headers' => $headers,
                'body' => wp_json_encode(['content' => $content, 'encoding' => 'utf-8']),
                'timeout' => 15
            ]);
            $blob_data = json_decode(wp_remote_retrieve_body($blob_res), true);
            if(empty($blob_data['sha'])) return new WP_Error('github_err', "Blob oluşturulamadı: $path");
            
            $tree[] = [
                'path' => $path,
                'mode' => '100644',
                'type' => 'blob',
                'sha'  => $blob_data['sha']
            ];
        }

        $new_tree_res = wp_remote_post("{$repo_api}/git/trees", [
            'headers' => $headers,
            'body' => wp_json_encode(['base_tree' => $base_tree, 'tree' => $tree]),
            'timeout' => 15
        ]);
        $new_tree_data = json_decode(wp_remote_retrieve_body($new_tree_res), true);
        $new_tree_sha = $new_tree_data['sha'] ?? '';
        if (!$new_tree_sha) return new WP_Error('github_err', 'Tree oluşturulamadı.');

        $new_commit_res = wp_remote_post("{$repo_api}/git/commits", [
            'headers' => $headers,
            'body' => wp_json_encode([
                'message' => $message,
                'tree' => $new_tree_sha,
                'parents' => [$parent_sha]
            ]),
            'timeout' => 15
        ]);
        $new_commit_data = json_decode(wp_remote_retrieve_body($new_commit_res), true);
        $new_commit_sha = $new_commit_data['sha'] ?? '';
        if (!$new_commit_sha) return new WP_Error('github_err', 'Commit oluşturulamadı.');

        $update_ref_res = wp_remote_request("{$repo_api}/git/refs/heads/{$branch_enc}", [
            'method' => 'PATCH',
            'headers' => $headers,
            'body' => wp_json_encode(['sha' => $new_commit_sha, 'force' => false]),
            'timeout' => 15
        ]);
        $update_code = wp_remote_retrieve_response_code($update_ref_res);
        
        if ($update_code !== 200) {
            $msg = json_decode(wp_remote_retrieve_body($update_ref_res), true);
            return new WP_Error('github_err', 'Branch güncellenemedi: ' . ($msg['message'] ?? 'Bilinmeyen hata'));
        }

        return true;
    }
}
