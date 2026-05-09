<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_de_broglie_dalga_boyu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-de-broglie-dalga-boyu-hesaplama',
        HC_PLUGIN_URL . 'modules/de-broglie-dalga-boyu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-de-broglie-dalga-boyu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/de-broglie-dalga-boyu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-de-broglie-dalga-boyu-hesaplama">
        <h3>De Broglie Dalga Boyu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dbd-mass">Kütle (m - kg)</label>
            <input type="number" id="hc-dbd-mass" placeholder="Örn: 9.1e-31 (Elektron)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dbd-v">Hız (v - m/s)</label>
            <input type="number" id="hc-dbd-v" placeholder="Örn: 1000000" step="any">
        </div>
        <button class="hc-btn" onclick="hcDBDHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dbd-result">
            <div class="hc-result-label">De Broglie Dalga Boyu (λ):</div>
            <div class="hc-result-value" id="hc-dbd-val">-</div>
            <div class="hc-result-note">λ = h / (m * v)</div>
        </div>
    </div>
    <?php
}
