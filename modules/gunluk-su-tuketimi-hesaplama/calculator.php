<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_su_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-water-calc',
        HC_PLUGIN_URL . 'modules/gunluk-su-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-water-calc-css',
        HC_PLUGIN_URL . 'modules/gunluk-su-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-water-calc">
        <h3>Günlük Su İhtiyacı</h3>
        <div class="hc-form-group">
            <label for="hc-wc-weight">Kilo (kg):</label>
            <input type="number" id="hc-wc-weight" placeholder="70">
        </div>
        <div class="hc-form-group">
            <label for="hc-wc-activity">Günlük Aktivite Süresi (Dakika):</label>
            <input type="number" id="hc-wc-activity" placeholder="30">
        </div>
        <button class="hc-btn" onclick="hcWaterCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-water-calc-result">
            <strong>İdeal Su Miktarı:</strong>
            <div id="hc-wc-res-val" class="hc-result-value">-</div>
            <span>Litre / Gün</span>
        </div>
    </div>
    <?php
}
