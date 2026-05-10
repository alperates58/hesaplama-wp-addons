<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kolesterol_risk_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kolesterol-risk-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/kolesterol-risk-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kolesterol-risk-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kolesterol-risk-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-chol-ratio">
        <h3>Kolesterol Risk Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-cr-tc">Toplam Kolesterol (mg/dL)</label>
            <input type="number" id="hc-cr-tc" placeholder="200">
        </div>
        <div class="hc-form-group">
            <label for="hc-cr-hdl">HDL (İyi) Kolesterol (mg/dL)</label>
            <input type="number" id="hc-cr-hdl" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcKolesterolRiskOranıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cr-result">
            <div class="hc-result-label">TC / HDL Oranı:</div>
            <div class="hc-result-value" id="hc-cr-val">-</div>
            <p id="hc-cr-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
