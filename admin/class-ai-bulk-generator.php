<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HC_AI_Bulk_Generator {

    public function __construct() {
        add_action( 'wp_ajax_hc_save_bot_settings', [ $this, 'ajax_save_bot_settings' ] );
        add_action( 'wp_ajax_hc_generate_and_push', [ $this, 'ajax_generate_and_push' ] );
        add_action( 'wp_ajax_hc_bulk_save_queue', [ $this, 'ajax_save_queue' ] );
    }

    public static function render_bulk_generator_tab() {
        $ai_provider = get_option('hc_ai_provider', 'deepseek');
        $api_key = get_option('hc_gemini_api_key', '');
        $gemini_model = get_option('hc_gemini_model', 'deepseek-chat');
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
                    <input type="text" id="hc_gemini_model" value="<?php echo esc_attr($gemini_model); ?>" class="large-text">
                    <p class="description">DeepSeek için: deepseek-chat | Gemini için: gemini-2.5-flash</p>
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
        let queue = <?php echo json_encode($queue); ?>;
        
        function renderTable() {
            const tbody = document.getElementById('queue-tbody');
            tbody.innerHTML = '';
            if(queue.length === 0) {
                tbody.innerHTML = '<tr><td colspan="3">Kuyruk boş.</td></tr>';
                return;
            }
            queue.forEach((item, index) => {
                let statusHtml = '';
                if(item.status === 'pending') statusHtml = '<span class="hc-inline-badge" style="background:#ff9800;color:#fff;">Bekliyor</span>';
                else if(item.status === 'success') statusHtml = '<span class="hc-inline-badge" style="background:#4CAF50;color:#fff;">Tamamlandı</span>';
                else statusHtml = '<span class="hc-inline-badge" style="background:#f44336;color:#fff;">Hata: ' + item.message + '</span>';

                tbody.innerHTML += `
                    <tr>
                        <td><input type="checkbox" class="cb-item" data-index="${index}" ${item.status === 'success' ? 'disabled' : ''}></td>
                        <td><strong>${item.title}</strong></td>
                        <td>${statusHtml}</td>
                    </tr>
                `;
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
            jQuery('#log-container').prepend('<div>[' + new Date().toLocaleTimeString() + '] ' + msg + '</div>');
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
                        if (errorText.includes('high demand') || errorText.includes('quota') || errorText.includes('429')) {
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

        update_option('hc_ai_provider', sanitize_text_field($_POST['ai_provider']));
        update_option('hc_gemini_api_key', sanitize_text_field($_POST['api_key']));
        update_option('hc_gemini_model', sanitize_text_field($_POST['gemini_model']));
        update_option('hc_serper_api_key', sanitize_text_field($_POST['serper_key']));
        update_option('hc_bot_gh_repo', sanitize_text_field($_POST['repo']));
        update_option('hc_bot_gh_branch', sanitize_text_field($_POST['branch']));
        update_option('hc_bot_gh_token', sanitize_text_field($_POST['token']));
        wp_send_json_success();
    }

    public function ajax_save_queue() {
        if ( ! current_user_can( 'manage_options' ) ) wp_send_json_error();
        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) wp_send_json_error();
        
        $queue_raw = wp_unslash($_POST['queue'] ?? '[]');
        $queue = json_decode($queue_raw, true);
        if(is_array($queue)) {
            update_option('hc_bulk_queue', $queue, false);
        }
        wp_send_json_success();
    }

    public function ajax_generate_and_push() {
        if ( ! current_user_can( 'manage_options' ) ) wp_send_json_error();
        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) wp_send_json_error();

        $title = sanitize_text_field($_POST['title']);
        $ai_provider = get_option('hc_ai_provider', 'deepseek');
        $api_key = get_option('hc_gemini_api_key');
        $ai_model = get_option('hc_gemini_model', 'deepseek-chat');
        $serper_key = get_option('hc_serper_api_key', '');
        
        $gh_settings = get_option('hc_github_settings', []);
        $gh_repo = isset($gh_settings['repo']) ? $gh_settings['repo'] : get_option('hc_bot_gh_repo', '');
        $gh_branch = isset($gh_settings['branch']) ? $gh_settings['branch'] : get_option('hc_bot_gh_branch', 'main');
        $gh_token = isset($gh_settings['token']) ? $gh_settings['token'] : get_option('hc_bot_gh_token', '');

        if(!$title || !$api_key) {
            wp_send_json_error('API Key eksik. Başlık ve API Key zorunludur.');
        }

        $slug = sanitize_title($title);
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

        $raw_text = "";

        // 3. AI Sağlayıcı İsteği
        if ($ai_provider === 'deepseek') {
            $payload = [
                'model' => $ai_model,
                'messages' => [['role' => 'user', 'content' => $prompt]],
                'response_format' => ['type' => 'json_object']
            ];

            $response = wp_remote_post("https://api.deepseek.com/chat/completions", [
                'timeout' => 90,
                'headers' => [
                    'Authorization' => 'Bearer ' . $api_key,
                    'Content-Type'  => 'application/json'
                ],
                'body' => wp_json_encode($payload)
            ]);

            if (is_wp_error($response)) wp_send_json_error('DeepSeek Bağlantı Hatası: ' . $response->get_error_message());
            $body = json_decode(wp_remote_retrieve_body($response), true);

            if (isset($body['error'])) {
                wp_send_json_error('DeepSeek API Hatası: ' . ($body['error']['message'] ?? wp_json_encode($body['error'])));
            }

            if(empty($body['choices'][0]['message']['content'])) {
                wp_send_json_error('DeepSeek yanıtı boş. Ham Yanıt: ' . wp_json_encode($body));
            }
            $raw_text = $body['choices'][0]['message']['content'];

        } else {
            // Gemini
            $payload = [
                'contents' => [['parts' => [['text' => $prompt]]]],
                'generationConfig' => ['responseMimeType' => 'application/json']
            ];

            $response = wp_remote_post("https://generativelanguage.googleapis.com/v1beta/models/{$ai_model}:generateContent?key={$api_key}", [
                'timeout' => 90,
                'headers' => ['Content-Type' => 'application/json'],
                'body'    => wp_json_encode($payload)
            ]);

            if (is_wp_error($response)) wp_send_json_error('Gemini Bağlantı Hatası: ' . $response->get_error_message());
            $body = json_decode(wp_remote_retrieve_body($response), true);

            if (isset($body['error'])) {
                wp_send_json_error('Gemini API Hatası: ' . ($body['error']['message'] ?? wp_json_encode($body['error'])));
            }

            if(empty($body['candidates'][0]['content']['parts'][0]['text'])) {
                wp_send_json_error('API yanıtı boş. Ham Yanıt: ' . wp_json_encode($body));
            }
            $raw_text = $body['candidates'][0]['content']['parts'][0]['text'];
        }

        // 4. JSON Temizleme ve Kaydetme
        $clean_text = preg_replace( '/^```(?:json)?\s*/i', '', trim( $raw_text ) );
        $clean_text = preg_replace( '/\s*```$/', '', $clean_text );

        $files = json_decode($clean_text, true);
        if(!$files) {
            wp_send_json_error('JSON dönüştürülemedi. Ham Yanıt: ' . substr($clean_text, 0, 500));
        }

        $github_files = [
            "modules/{$slug}/meta.json"      => $files['meta.json'],
            "modules/{$slug}/calculator.php" => $files['calculator.php'],
            "modules/{$slug}/calculator.js"  => $files['calculator.js'],
            "modules/{$slug}/calculator.css" => isset($files['calculator.css']) ? $files['calculator.css'] : ''
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
            if ( !file_exists($module_dir) ) wp_mkdir_p($module_dir);

            foreach($files as $filename => $content) {
                if(!empty($content)) {
                    file_put_contents($module_dir . '/' . sanitize_file_name($filename), $content);
                }
            }
            wp_send_json_success('Lokal Klasöre Kaydedildi!');
        }
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
