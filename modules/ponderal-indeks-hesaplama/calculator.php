<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ponderal_indeks_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pi',
        HC_PLUGIN_URL . 'modules/ponderal-indeks-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pi-css',
        HC_PLUGIN_URL . 'modules/ponderal-indeks-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pi">
        <h3>Ponderal İndeks (PI)</h3>
        <div class="hc-form-group">
            <label for="hc-pi-height">Boy (cm):</label>
            <input type="number" id="hc-pi-height" placeholder="175">
        </div>
        <div class="hc-form-group">
            <label for="hc-pi-weight">Kilo (kg):</label>
            <input type="number" id="hc-pi-weight" placeholder="70">
        </div>
        <button class="hc-btn" onclick="hcPiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pi-result">
            <strong>Ponderal İndeks: <span id="hc-pi-res-val" class="hc-result-value">-</span> kg/m³</strong>
            <div id="hc-pi-res-desc" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
