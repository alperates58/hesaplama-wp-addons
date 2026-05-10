<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hedef_kilo_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-target-weight',
        HC_PLUGIN_URL . 'modules/hedef-kilo-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-target-weight-css',
        HC_PLUGIN_URL . 'modules/hedef-kilo-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-target-weight">
        <h3>Hedef Kilo Hesaplayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-tw-height">Boy (cm):</label>
            <input type="number" id="hc-tw-height" placeholder="175">
        </div>
        <div class="hc-form-group">
            <label for="hc-tw-vki">Hedeflenen VKİ (Örn: 22):</label>
            <input type="number" id="hc-tw-vki" value="22" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcTargetWeightHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-target-weight-result">
            <strong>Hedef Kilonuz:</strong>
            <div id="hc-tw-res-val" class="hc-result-value">-</div>
            <span>kg</span>
        </div>
    </div>
    <?php
}
