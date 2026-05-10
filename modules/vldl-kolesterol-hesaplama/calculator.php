<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vldl_kolesterol_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vldl-kolesterol-hesaplama',
        HC_PLUGIN_URL . 'modules/vldl-kolesterol-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vldl-kolesterol-hesaplama-css',
        HC_PLUGIN_URL . 'modules/vldl-kolesterol-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vldl-calc">
        <h3>VLDL Kolesterol Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-vldl-tg">Trigliserid (mg/dL)</label>
            <input type="number" id="hc-vldl-tg" placeholder="Örn: 150">
        </div>
        <button class="hc-btn" onclick="hcVLDLHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vldl-result">
            <div class="hc-result-label">Tahmini VLDL:</div>
            <div class="hc-result-value" id="hc-vldl-val">-</div>
            <p style="font-size:0.85em; color:#666; margin-top:10px;">*VLDL = Trigliserid / 5 formülü kullanılır.</p>
        </div>
    </div>
    <?php
}
