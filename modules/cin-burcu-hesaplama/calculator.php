<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-zodiac',
        HC_PLUGIN_URL . 'modules/cin-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cin-zodiac-css',
        HC_PLUGIN_URL . 'modules/cin-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cin-burcu-hesaplama">
        <h3>Çin Burcu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cin-date">Doğum Tarihi</label>
            <input type="date" id="hc-cin-date">
        </div>
        <button class="hc-btn" onclick="hcCinBurcuHesapla()">Burcumu Bul</button>
        <div class="hc-result" id="hc-cin-result">
            <div class="hc-result-label">Çin Burcunuz:</div>
            <div class="hc-result-value" id="hc-cin-val"></div>
            <div class="hc-result-desc" id="hc-cin-desc"></div>
        </div>
    </div>
    <?php
}
