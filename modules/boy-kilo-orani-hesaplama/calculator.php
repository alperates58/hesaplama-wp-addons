<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_boy_kilo_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hw-ratio',
        HC_PLUGIN_URL . 'modules/boy-kilo-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hw-ratio-css',
        HC_PLUGIN_URL . 'modules/boy-kilo-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hw-ratio">
        <h3>Boy - Kilo Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-hr-height">Boy (cm):</label>
            <input type="number" id="hc-hr-height" placeholder="175">
        </div>
        <div class="hc-form-group">
            <label for="hc-hr-weight">Kilo (kg):</label>
            <input type="number" id="hc-hr-weight" placeholder="70">
        </div>
        <button class="hc-btn" onclick="hcHwRatioHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hw-ratio-result">
            <strong>Oran: <span id="hc-hr-res-val" class="hc-result-value">-</span></strong>
            <p style="font-size:0.85em; margin-top:10px; opacity:0.8;">Her 1 cm boy başına düşen gram miktarını gösterir.</p>
        </div>
    </div>
    <?php
}
