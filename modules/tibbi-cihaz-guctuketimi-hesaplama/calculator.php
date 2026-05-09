<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tibbi_cihaz_guctuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-medical-power',
        HC_PLUGIN_URL . 'modules/tibbi-cihaz-guctuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-medical-power-css',
        HC_PLUGIN_URL . 'modules/tibbi-cihaz-guctuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-medical-power">
        <h3>Tıbbi Cihaz Enerji Tüketimi</h3>
        <div class="hc-form-group">
            <label for="hc-mp-watt">Cihaz Gücü [Watt]</label>
            <input type="number" id="hc-mp-watt" value="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-mp-hours">Günlük Çalışma Süresi [Saat]</label>
            <input type="number" id="hc-mp-hours" value="24">
        </div>
        <button class="hc-btn" onclick="hcMedicalPowerHesapla()">Tüketimi Hesapla</button>
        <div class="hc-result" id="hc-medical-power-result">
            <div class="hc-result-item">
                <span>Günlük Tüketim:</span>
                <span class="hc-result-value" id="hc-res-mp-val">0 kWh</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık (30 Gün):</span>
                <span id="hc-res-mp-monthly">0 kWh</span>
            </div>
        </div>
    </div>
    <?php
}
