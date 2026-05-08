<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_co2_emisyon_sinifi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-co2-class',
        HC_PLUGIN_URL . 'modules/co2-emisyon-sinifi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cec-box">
        <h3>CO2 Emisyon Sınıfı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Emisyon Değeri (g/km)</label>
            <input type="number" id="hc-cec-val-input" placeholder="Örn: 115">
        </div>
        <button class="hc-btn" onclick="hcCecHesapla()">Sınıfı Belirle</button>
        <div class="hc-result" id="hc-cec-result">
            <div class="hc-result-title">Emisyon Sınıfı:</div>
            <div class="hc-result-value" id="hc-cec-class-val" style="font-size: 48px;">-</div>
            <div id="hc-cec-desc" style="margin-top: 10px; font-weight: bold;"></div>
        </div>
    </div>
    <?php
}
