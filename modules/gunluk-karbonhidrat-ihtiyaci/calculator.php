<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_karbonhidrat_ihtiyaci( $atts ) {
    wp_enqueue_script(
        'hc-carb',
        HC_PLUGIN_URL . 'modules/gunluk-karbonhidrat-ihtiyaci/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-carb">
        <h3>Günlük Karbonhidrat İhtiyacı</h3>
        
        <div class="hc-form-group">
            <label for="hc-carb-toplam">Günlük Toplam Kalori Alımı (kcal)</label>
            <input type="number" id="hc-carb-toplam" placeholder="Örn: 2000">
        </div>

        <div class="hc-form-group">
            <label for="hc-carb-oran">Hedef Oran (%)</label>
            <select id="hc-carb-oran">
                <option value="45">Düşük (%45)</option>
                <option value="55" selected>Orta (%55 - Önerilen)</option>
                <option value="65">Yüksek (%65 - Sporcular için)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcKarbonhidratHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-gunluk-karbonhidrat-result">
            <div class="hc-result-item">
                <span>Günlük Karbonhidrat Miktarı (Gram):</span>
                <div class="hc-result-value" id="hc-carb-gram">-</div>
            </div>
            <div class="hc-result-item">
                <span>Karbonhidrattan Gelen Enerji:</span>
                <strong id="hc-carb-kcal">-</strong>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *1 gram karbonhidrat yaklaşık 4 kcal enerji sağlar.
            </p>
        </div>
    </div>
    <?php
}
