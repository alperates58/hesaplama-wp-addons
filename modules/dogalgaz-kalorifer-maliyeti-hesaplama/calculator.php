<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogalgaz_kalorifer_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gas-heating',
        HC_PLUGIN_URL . 'modules/dogalgaz-kalorifer-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gas-heating-css',
        HC_PLUGIN_URL . 'modules/dogalgaz-kalorifer-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gas-heating">
        <h3>Doğalgaz Kalorifer Maliyeti</h3>
        
        <div class="hc-form-group">
            <label for="hc-gh-area">Ev Alanı (m²)</label>
            <input type="number" id="hc-gh-area" placeholder="Örn: 100" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-gh-insulation">Yalıtım Durumu</label>
            <select id="hc-gh-insulation">
                <option value="1.0">Çok İyi (A Sınıfı)</option>
                <option value="1.5">İyi (Yalıtımlı)</option>
                <option value="2.5">Orta (Eski Bina)</option>
                <option value="4.0">Zayıf (Yalıtımsız)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-gh-temp">Hedef Sıcaklık</label>
            <select id="hc-gh-temp">
                <option value="0.9">Ekonomik (19-20°C)</option>
                <option value="1.0">Konfor (21-22°C)</option>
                <option value="1.2">Sıcak (23-24°C)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-gh-price">Gaz Fiyatı (₺/m³)</label>
            <input type="number" id="hc-gh-price" value="9.50" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcKaloriferMaliyetHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-gh-result">
            <div class="hc-result-item">
                <span>Tahmini Aylık Tüketim:</span>
                <span class="hc-result-value" id="hc-res-gh-m3">-</span>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Aylık Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-gh-cost">-</span>
            </div>
            <div class="hc-result-note">
                * Kış aylarındaki ortalama tüketimi temsil eder.
            </div>
        </div>
    </div>
    <?php
}
