<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kalp_riski_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kalp-riski-skoru-hesaplama',
        HC_PLUGIN_URL . 'modules/kalp-riski-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kalp-riski-skoru-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kalp-riski-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-heart-score">
        <h3>Kardiyovasküler Risk Skoru</h3>
        <div class="hc-form-group">
            <label for="hc-hs-age">Yaş</label>
            <input type="number" id="hc-hs-age" placeholder="Örn: 55">
        </div>
        <div class="hc-form-group">
            <label for="hc-hs-chol">LDL Kolesterol (mg/dL)</label>
            <input type="number" id="hc-hs-chol" placeholder="Örn: 130">
        </div>
        <div class="hc-form-group">
            <label for="hc-hs-sbp">Sistolik Tansiyon (mmHg)</label>
            <input type="number" id="hc-hs-sbp" placeholder="Örn: 140">
        </div>
        <button class="hc-btn" onclick="hcKalpRiskiSkoruHesapla()">Skorla</button>
        <div class="hc-result" id="hc-hs-result">
            <div id="hc-hs-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
