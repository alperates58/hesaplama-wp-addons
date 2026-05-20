<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ai_goruntu_uretim_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ai-goruntu-uretim-maliyeti-hesaplama',
        HC_PLUGIN_URL . 'modules/ai-goruntu-uretim-maliyeti-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-ai-goruntu-maliyet">
        <h3>AI Görüntü Üretim Maliyeti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-aigm-model">Kullanılan Görsel Modeli</label>
            <select id="hc-aigm-model" onchange="hcAigmModelDegisti()">
                <option value="dalle3-hd">DALL-E 3 (HD Kalite - 1024x1024 / 1024x1792)</option>
                <option value="dalle3-std">DALL-E 3 (Standart - 1024x1024)</option>
                <option value="dalle2">DALL-E 2 (512x512 / 256x256)</option>
                <option value="sdxl">Stable Diffusion XL (SDXL API - Ortalama)</option>
                <option value="sd15">Stable Diffusion 1.5 (API - Ortalama)</option>
                <option value="custom">Özel Birim Görsel Fiyatı ($)...</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-aigm-custom-price-gr" style="display: none;">
            <label for="hc-aigm-custom-price">Görsel Başına Özel Maliyet ($)</label>
            <input type="number" id="hc-aigm-custom-price" min="0.0001" step="0.0001" value="0.02" />
        </div>

        <div class="hc-form-group">
            <label for="hc-aigm-adet">Üretilecek Görüntü / Görsel Adedi</label>
            <input type="number" id="hc-aigm-adet" min="1" value="500" />
        </div>

        <div class="hc-form-group">
            <label for="hc-aigm-dolar">Dolar Kuru (USD/TRY)</label>
            <input type="number" id="hc-aigm-dolar" min="1" step="0.01" value="36.00" />
        </div>

        <button class="hc-btn" onclick="hcAiGoruntuUretimMaliyetiHesapla()">Üretim Maliyetini Hesapla</button>

        <div class="hc-result" id="hc-ai-goruntu-maliyet-result">
            <table>
                <tr>
                    <td>Görsel Başına Maliyet ($)</td>
                    <td><strong id="hc-aigm-res-tek-usd">-</strong></td>
                </tr>
                <tr>
                    <td>Görsel Başına Maliyet (₺)</td>
                    <td><strong id="hc-aigm-res-tek-try">-</strong></td>
                </tr>
                <tr>
                    <td>Toplam Üretim Maliyeti ($)</td>
                    <td><strong id="hc-aigm-res-toplam-usd" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
                <tr>
                    <td>Toplam Üretim Maliyeti (₺)</td>
                    <td><strong class="hc-result-value" id="hc-aigm-res-toplam-try" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
