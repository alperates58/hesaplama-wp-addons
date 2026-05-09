<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akustik_empedans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-akustik-empedans-hesaplama',
        HC_PLUGIN_URL . 'modules/akustik-empedans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-akustik-empedans-hesaplama-css',
        HC_PLUGIN_URL . 'modules/akustik-empedans-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-akustik-empedans-hesaplama">
        <h3>Akustik Empedans Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ae-density">Ortam Yoğunluğu (ρ - kg/m³)</label>
            <input type="number" id="hc-ae-density" placeholder="Örn: 1.225 (Hava)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ae-speed">Ses Hızı (c - m/s)</label>
            <input type="number" id="hc-ae-speed" placeholder="Örn: 343" step="any">
        </div>
        <button class="hc-btn" onclick="hcAEHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ae-result">
            <div class="hc-result-label">Akustik Empedans (Z):</div>
            <div class="hc-result-value" id="hc-ae-val">-</div>
            <div class="hc-result-note">Z = ρ * c (Pa·s/m)</div>
        </div>
    </div>
    <?php
}
