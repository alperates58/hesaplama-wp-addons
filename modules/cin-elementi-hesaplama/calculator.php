<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_elementi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-elem',
        HC_PLUGIN_URL . 'modules/cin-elementi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cin-elem-css',
        HC_PLUGIN_URL . 'modules/cin-elementi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cin-elementi-hesaplama">
        <h3>Çin Elementi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cine-date">Doğum Tarihi</label>
            <input type="date" id="hc-cine-date">
        </div>
        <button class="hc-btn" onclick="hcCinElemHesapla()">Elementini Bul</button>
        <div class="hc-result" id="hc-cine-result">
            <div class="hc-result-label">Elementiniz:</div>
            <div class="hc-result-value" id="hc-cine-val"></div>
            <div class="hc-result-desc" id="hc-cine-desc"></div>
        </div>
    </div>
    <?php
}
