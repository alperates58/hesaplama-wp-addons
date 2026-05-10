<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ikili_sayidan_onlu_sayiya_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bin-to-dec',
        HC_PLUGIN_URL . 'modules/ikili-sayidan-onlu-sayiya-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bin-to-dec-css',
        HC_PLUGIN_URL . 'modules/ikili-sayidan-onlu-sayiya-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bin-dec">
        <h3>İkiliden Onluya Çeviri</h3>
        <div class="hc-form-group">
            <label for="hc-bd-bin">İkili Sayı (Binary):</label>
            <input type="text" id="hc-bd-bin" placeholder="101101">
        </div>
        <button class="hc-btn" onclick="hcBinToDecHesapla()">Çevir</button>
        <div class="hc-result" id="hc-bin-dec-result">
            <strong>Onlu Karşılığı (Decimal):</strong>
            <div id="hc-bd-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
