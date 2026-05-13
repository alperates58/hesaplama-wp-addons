<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rayleigh_dagilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rayleigh-dagilimi-hesaplama',
        HC_PLUGIN_URL . 'modules/rayleigh-dagilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rayleigh-dagilimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/rayleigh-dagilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rayleigh-dagilimi-hesaplama">
        <h3>Rayleigh Dağılımı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rayleigh-x">Gözlem Değeri (x)</label>
            <input type="number" id="hc-rayleigh-x" step="any" placeholder="x >= 0">
        </div>
        <div class="hc-form-group">
            <label for="hc-rayleigh-sigma">Ölçek Parametresi (σ)</label>
            <input type="number" id="hc-rayleigh-sigma" step="any" placeholder="σ > 0">
        </div>
        <button class="hc-btn" onclick="hcRayleighHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rayleigh-dagilimi-hesaplama-result">
            <div id="hc-rayleigh-pdf"></div>
            <div id="hc-rayleigh-cdf"></div>
            <div id="hc-rayleigh-mean"></div>
        </div>
    </div>
    <?php
}
