<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_spor_icecegi_karisimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-spor-icecegi-karisimi-hesaplama',
        HC_PLUGIN_URL . 'modules/spor-icecegi-karisimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-spor-icecegi-karisimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/spor-icecegi-karisimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-drink">
        <h3>Spor İçeceği Karışımı (İzotonik)</h3>
        <div class="hc-form-group">
            <label for="hc-drink-vol">Hazırlanacak Miktar (ml)</label>
            <input type="number" id="hc-drink-vol" value="500" step="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-drink-intensity">Egzersiz Yoğunluğu</label>
            <select id="hc-drink-intensity">
                <option value="6">Düşük / Orta (%6 Karbonhidrat)</option>
                <option value="8" selected>Yüksek (%8 Karbonhidrat)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSporİçeceğiKarışımıHesapla()">Tarifi Al</button>
        <div class="hc-result" id="hc-drink-result">
            <div class="hc-result-label">Karışım Tarifi:</div>
            <div id="hc-drink-recipe" style="margin-top: 10px; font-weight: 500; line-height: 1.6;"></div>
            <p style="font-size: 0.85em; color: #666; margin-top: 10px;">*İdeal izotonik içecek ozmolaritesi için bu oranlar önerilir.</p>
        </div>
    </div>
    <?php
}
