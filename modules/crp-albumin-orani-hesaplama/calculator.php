<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_crp_albumin_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-crp-albumin-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/crp-albumin-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-crp-albumin-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/crp-albumin-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-car">
        <h3>CRP / Albümin Oranı (CAR)</h3>
        <div class="hc-form-group">
            <label for="hc-ca-crp">CRP (mg/L)</label>
            <input type="number" id="hc-ca-crp" placeholder="10" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ca-alb">Albümin (g/dL)</label>
            <input type="number" id="hc-ca-alb" placeholder="4.0" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcCRPAlbüminOranıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ca-result">
            <div class="hc-result-label">Oran:</div>
            <div class="hc-result-value" id="hc-ca-val">-</div>
            <p style="font-size:0.85em; color:#666; margin-top:10px;">*CAR, sistemik enflamasyonun bir göstergesidir.</p>
        </div>
    </div>
    <?php
}
