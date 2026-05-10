<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iade_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-return-rate',
        HC_PLUGIN_URL . 'modules/iade-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-return-rate-css',
        HC_PLUGIN_URL . 'modules/iade-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-return-rate">
        <h3>İade Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ir-sales">Toplam Satış Adedi:</label>
            <input type="number" id="hc-ir-sales" placeholder="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-ir-returns">İade Adedi:</label>
            <input type="number" id="hc-ir-returns" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcReturnRateHesapla()">Oranı Hesapla</button>
        <div class="hc-result" id="hc-return-rate-result">
            <strong>İade Oranı:</strong>
            <div id="hc-ir-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
