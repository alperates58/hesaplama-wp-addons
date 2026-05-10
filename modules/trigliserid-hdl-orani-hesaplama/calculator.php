<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_trigliserid_hdl_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-trigliserid-hdl-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/trigliserid-hdl-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-trigliserid-hdl-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/trigliserid-hdl-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tg-hdl">
        <h3>Trigliserid / HDL Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-th-tg">Trigliserid (mg/dL)</label>
            <input type="number" id="hc-th-tg" placeholder="150">
        </div>
        <div class="hc-form-group">
            <label for="hc-th-hdl">HDL (İyi) Kolesterol (mg/dL)</label>
            <input type="number" id="hc-th-hdl" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcTrigliseridHDLOranıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-th-result">
            <div class="hc-result-label">Oran:</div>
            <div class="hc-result-value" id="hc-th-val">-</div>
            <p id="hc-th-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
