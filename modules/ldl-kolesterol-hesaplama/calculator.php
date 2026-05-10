<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ldl_kolesterol_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ldl-kolesterol-hesaplama',
        HC_PLUGIN_URL . 'modules/ldl-kolesterol-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ldl-kolesterol-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ldl-kolesterol-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ldl-calc">
        <h3>LDL Kolesterol Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ldl-tc">Toplam Kolesterol (mg/dL)</label>
            <input type="number" id="hc-ldl-tc" placeholder="Örn: 200">
        </div>
        <div class="hc-form-group">
            <label for="hc-ldl-hdl">HDL (İyi) Kolesterol (mg/dL)</label>
            <input type="number" id="hc-ldl-hdl" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-ldl-tg">Trigliserid (mg/dL)</label>
            <input type="number" id="hc-ldl-tg" placeholder="Örn: 150">
        </div>
        <button class="hc-btn" onclick="hcLDLHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ldl-result">
            <div class="hc-result-label">Tahmini LDL Seviyesi:</div>
            <div class="hc-result-value" id="hc-ldl-val">-</div>
            <p id="hc-ldl-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
