<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_llm_baglam_penceresi_token_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-llm-baglam-penceresi-token-hesaplama',
        HC_PLUGIN_URL . 'modules/llm-baglam-penceresi-token-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-llm-baglam-token">
        <h3>LLM Bağlam Penceresi Token Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-lbt-model">Hedef Model (Bağlam Penceresi Limiti)</label>
            <select id="hc-lbt-model" onchange="hcLbtModelDegisti()">
                <option value="131072">GPT-4o / GPT-4 Turbo (128.000 Token)</option>
                <option value="204800">Claude 3.5 Sonnet / Claude 3 (200.000 Token)</option>
                <option value="2097152">Gemini 1.5 Pro / Flash (2.000.000 Token)</option>
                <option value="131072">Llama 3.1 (128.000 Token)</option>
                <option value="8192">Llama 3 (8.192 Token)</option>
                <option value="custom">Özel Limit Belirt...</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-lbt-custom-limit-gr" style="display: none;">
            <label for="hc-lbt-custom-limit">Özel Bağlam Limiti (Token)</label>
            <input type="number" id="hc-lbt-custom-limit" min="1" value="32768" />
        </div>

        <div class="hc-form-group">
            <label for="hc-lbt-dil">Metin Dili / Tipi</label>
            <select id="hc-lbt-dil">
                <option value="tr">Türkçe Metin (1 kelime ≈ 1.8 token)</option>
                <option value="en">İngilizce Metin (1 kelime ≈ 1.3 token)</option>
                <option value="kod">Kodlama Dosyası / Veri (JSON, Python vb.) (1 kelime ≈ 2.2 token)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-lbt-girdi-turu">Giriş Yöntemi</label>
            <select id="hc-lbt-girdi-turu" onchange="hcLbtGirdiTuruDegisti()">
                <option value="kelime">Kelime Sayısı Girmek İstiyorum</option>
                <option value="metin">Metni Doğrudan Yapıştırmak İstiyorum</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-lbt-kelime-gr">
            <label for="hc-lbt-kelime-sayisi">Toplam Kelime Sayısı</label>
            <input type="number" id="hc-lbt-kelime-sayisi" min="1" value="1000" />
        </div>

        <div class="hc-form-group" id="hc-lbt-metin-gr" style="display: none;">
            <label for="hc-lbt-metin">Metni Buraya Yapıştırın</label>
            <textarea id="hc-lbt-metin" rows="6" placeholder="Hesaplanacak metni buraya yazın veya yapıştırın..." oninput="hcLbtMetinDegisti()"></textarea>
            <small style="color:#666;font-size:12px;" id="hc-lbt-metin-bilgi">Karakter: 0 | Kelime: 0</small>
        </div>

        <button class="hc-btn" onclick="hcLlmBaglamPenceresiTokenHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-llm-baglam-token-result">
            <table>
                <tr>
                    <td>Yaklaşık Token Adedi</td>
                    <td><strong class="hc-result-value" id="hc-lbt-res-token" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
                <tr>
                    <td>Model Bağlam Penceresi Limiti</td>
                    <td><strong id="hc-lbt-res-limit">-</strong></td>
                </tr>
                <tr>
                    <td>Bağlam Penceresi Doluluk Oranı</td>
                    <td><strong id="hc-lbt-res-doluluk">-</strong></td>
                </tr>
                <tr>
                    <td>Kalan Boş Alan (Kapasite)</td>
                    <td><strong id="hc-lbt-res-kalan" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
