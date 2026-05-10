<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fazla_kilo_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-excess-weight',
        HC_PLUGIN_URL . 'modules/fazla-kilo-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-excess-weight-css',
        HC_PLUGIN_URL . 'modules/fazla-kilo-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-excess-weight">
        <h3>Fazla Kilo Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-exw-height">Boy (cm):</label>
            <input type="number" id="hc-exw-height" placeholder="175">
        </div>
        <div class="hc-form-group">
            <label for="hc-exw-weight">Mevcut Kilo (kg):</label>
            <input type="number" id="hc-exw-weight" placeholder="90">
        </div>
        <button class="hc-btn" onclick="hcExcessWeightHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-excess-weight-result">
            <strong>Tahmini Fazla Kilonuz: <span id="hc-exw-res-val" class="hc-result-value">-</span> kg</strong>
            <p id="hc-exw-res-desc" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
