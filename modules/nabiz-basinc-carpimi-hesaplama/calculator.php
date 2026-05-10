<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nabiz_basinc_carpimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nabiz-basinc-carpimi-hesaplama',
        HC_PLUGIN_URL . 'modules/nabiz-basinc-carpimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-nabiz-basinc-carpimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/nabiz-basinc-carpimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rpp-calc">
        <h3>Nabız-Basınç Çarpımı (RPP)</h3>
        <div class="hc-form-group">
            <label for="hc-rpp-sys">Sistolik Tansiyon (mmHg)</label>
            <input type="number" id="hc-rpp-sys" placeholder="120">
        </div>
        <div class="hc-form-group">
            <label for="hc-rpp-hr">Kalp Hızı (atım/dk)</label>
            <input type="number" id="hc-rpp-hr" placeholder="70">
        </div>
        <button class="hc-btn" onclick="hcRPPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rpp-result">
            <div class="hc-result-label">RPP Değeri:</div>
            <div class="hc-result-value" id="hc-rpp-val">-</div>
        </div>
    </div>
    <?php
}
