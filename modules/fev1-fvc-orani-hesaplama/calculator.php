<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fev1_fvc_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fev1-fvc',
        HC_PLUGIN_URL . 'modules/fev1-fvc-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fev1-fvc-css',
        HC_PLUGIN_URL . 'modules/fev1-fvc-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fev1-fvc">
        <h3>FEV1/FVC Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ff-fev1">FEV1 (Litre):</label>
            <input type="number" id="hc-ff-fev1" placeholder="Örn: 3.2" step="0.01">
            <small>Birinci saniyedeki zorlu ekspiratuar hacim.</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-ff-fvc">FVC (Litre):</label>
            <input type="number" id="hc-ff-fvc" placeholder="Örn: 4.0" step="0.01">
            <small>Zorlu vital kapasite.</small>
        </div>
        <button class="hc-btn" onclick="hcFev1FvcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fev1-fvc-result">
            <strong>FEV1/FVC Oranı:</strong>
            <div id="hc-ff-res-val" class="hc-result-value">-</div>
            <div id="hc-ff-res-desc" style="margin-top:10px; font-weight:500;"></div>
        </div>
    </div>
    <?php
}
