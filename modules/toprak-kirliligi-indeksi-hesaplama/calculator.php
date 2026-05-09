<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_toprak_kirliligi_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-soil-pollution',
        HC_PLUGIN_URL . 'modules/toprak-kirliligi-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-soil-pollution-css',
        HC_PLUGIN_URL . 'modules/toprak-kirliligi-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-soil-pollution">
        <h3>Toprak Kirlilik İndeksi (PI)</h3>
        <div class="hc-form-group">
            <label for="hc-sp-c">Ölçülen Konsantrasyon (Ci) [mg/kg]</label>
            <input type="number" id="hc-sp-c" value="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-sp-s">Standart Limit Değer (Si) [mg/kg]</label>
            <input type="number" id="hc-sp-s" value="20">
        </div>
        <button class="hc-btn" onclick="hcSoilPollutionHesapla()">İndeksi Hesapla</button>
        <div class="hc-result" id="hc-soil-pollution-result">
            <div class="hc-result-item">
                <span>Kirlilik İndeksi (PI):</span>
                <span class="hc-result-value" id="hc-res-sp-val">0</span>
            </div>
            <p id="hc-sp-status" class="hc-sp-status"></p>
        </div>
    </div>
    <?php
}
