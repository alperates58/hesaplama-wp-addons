<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_non_hdl_kolesterol_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-non-hdl-kolesterol-hesaplama',
        HC_PLUGIN_URL . 'modules/non-hdl-kolesterol-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-non-hdl-kolesterol-hesaplama-css',
        HC_PLUGIN_URL . 'modules/non-hdl-kolesterol-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-non-hdl">
        <h3>Non-HDL Kolesterol Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-nh-tc">Toplam Kolesterol (mg/dL)</label>
            <input type="number" id="hc-nh-tc" placeholder="200">
        </div>
        <div class="hc-form-group">
            <label for="hc-nh-hdl">HDL (İyi) Kolesterol (mg/dL)</label>
            <input type="number" id="hc-nh-hdl" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcNonHDLHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-nh-result">
            <div class="hc-result-label">Non-HDL Değeri:</div>
            <div class="hc-result-value" id="hc-nh-val">-</div>
            <p style="font-size:0.85em; color:#666; margin-top:10px;">*Non-HDL = Toplam Kolesterol - HDL</p>
        </div>
    </div>
    <?php
}
