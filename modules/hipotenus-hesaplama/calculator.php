<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hipotenus_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hypotenuse',
        HC_PLUGIN_URL . 'modules/hipotenus-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hypotenuse-css',
        HC_PLUGIN_URL . 'modules/hipotenus-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hypotenuse">
        <h3>Hipotenüs Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hp-a">1. Dik Kenar (a):</label>
            <input type="number" id="hc-hp-a" step="0.01" placeholder="3">
        </div>
        <div class="hc-form-group">
            <label for="hc-hp-b">2. Dik Kenar (b):</label>
            <input type="number" id="hc-hp-b" step="0.01" placeholder="4">
        </div>
        <button class="hc-btn" onclick="hcHypotenuseHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hypotenuse-result">
            <strong>Hipotenüs (c):</strong>
            <div id="hc-hp-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
