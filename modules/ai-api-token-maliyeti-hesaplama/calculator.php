<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ai_api_token_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ai-api-token-maliyeti-hesaplama',
        HC_PLUGIN_URL . 'modules/ai-api-token-maliyeti-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-ai-api-token-maliyeti">
        <h3>AI API Token Maliyeti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ait-model">Yapay Zeka Modeli</label>
            <select id="hc-ait-model" onchange="hcAiModelDegisti()">
                <option value="gpt-4o">GPT-4o (OpenAI)</option>
                <option value="gpt-4o-mini">GPT-4o mini (OpenAI)</option>
                <option value="claude-3-5-sonnet">Claude 3.5 Sonnet (Anthropic)</option>
                <option value="claude-3-haiku">Claude 3 Haiku (Anthropic)</option>
                <option value="gemini-1-5-pro">Gemini 1.5 Pro (Google)</option>
                <option value="gemini-1-5-flash">Gemini 1.5 Flash (Google)</option>
                <option value="llama-3-70b">Llama 3 70B (Deepinfra/Groq/Open-Source)</option>
                <option value="custom">Özel Fiyat Tanımla...</option>
            </select>
        </div>

        <div id="hc-ait-custom-prices" style="display: none; background:#f4f7fa; padding:15px; border-radius:8px; margin-bottom:15px;">
            <div class="hc-form-group" style="margin-bottom:8px;">
                <label for="hc-ait-custom-input">1 Milyon Girdi (Input) Fiyatı ($)</label>
                <input type="number" id="hc-ait-custom-input" min="0" step="0.01" value="5.00" />
            </div>
            <div class="hc-form-group" style="margin-bottom:0;">
                <label for="hc-ait-custom-output">1 Milyon Çıktı (Output) Fiyatı ($)</label>
                <input type="number" id="hc-ait-custom-output" min="0" step="0.01" value="15.00" />
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-ait-input-tokens">İstek Başına Girdi (Prompt) Token Sayısı</label>
            <input type="number" id="hc-ait-input-tokens" min="0" placeholder="örn: 1500" value="1000" />
            <small style="color:#666;font-size:12px;">Yaklaşık 750 kelime = 1.000 Token</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-ait-output-tokens">İstek Başına Çıktı (Completion) Token Sayısı</label>
            <input type="number" id="hc-ait-output-tokens" min="0" placeholder="örn: 500" value="500" />
        </div>

        <div class="hc-form-group">
            <label for="hc-ait-requests">Aylık Toplam İstek Sayısı (API Çağrısı)</label>
            <input type="number" id="hc-ait-requests" min="1" placeholder="örn: 10000" value="5000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-ait-dolar">Dolar Kuru (USD/TRY)</label>
            <input type="number" id="hc-ait-dolar" min="1" step="0.01" value="36.00" />
        </div>

        <button class="hc-btn" onclick="hcAiApiTokenMaliyetiHesapla()">Maliyeti Hesapla</button>

        <div class="hc-result" id="hc-ai-api-token-maliyeti-result">
            <table>
                <tr>
                    <td>İstek Başına Girdi Maliyeti</td>
                    <td><strong id="hc-ait-res-istek-girdi">-</strong></td>
                </tr>
                <tr>
                    <td>İstek Başına Çıktı Maliyeti</td>
                    <td><strong id="hc-ait-res-istek-cikti">-</strong></td>
                </tr>
                <tr>
                    <td>Tek Bir İstek Maliyeti (Toplam)</td>
                    <td><strong id="hc-ait-res-istek-toplam">-</strong></td>
                </tr>
                <tr>
                    <td>Aylık Toplam Maliyet ($)</td>
                    <td><strong id="hc-ait-res-aylik-usd" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
                <tr>
                    <td>Aylık Toplam Maliyet (₺)</td>
                    <td><strong class="hc-result-value" id="hc-ait-res-aylik-try" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
