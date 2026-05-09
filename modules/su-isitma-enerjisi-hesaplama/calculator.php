<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_isitma_enerjisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-water-heating',
        HC_PLUGIN_URL . 'modules/su-isitma-enerjisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-water-heating-css',
        HC_PLUGIN_URL . 'modules/su-isitma-enerjisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-water-heating">
        <h3>Su Isıtma Enerji Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-wh-vol">Su Miktarı [Litre]</label>
            <input type="number" id="hc-wh-vol" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-wh-ti">İlk Sıcaklık [°C]</label>
            <input type="number" id="hc-wh-ti" value="15">
        </div>
        <div class="hc-form-group">
            <label for="hc-wh-tf">Hedef Sıcaklık [°C]</label>
            <input type="number" id="hc-wh-tf" value="60">
        </div>
        <div class="hc-form-group">
            <label for="hc-wh-eff">Verimlilik [%]</label>
            <input type="number" id="hc-wh-eff" value="90">
            <small>Elektrikli: %95, Doğalgaz: %85</small>
        </div>
        <button class="hc-btn" onclick="hcWaterHeatingHesapla()">Enerjiyi Hesapla</button>
        <div class="hc-result" id="hc-water-heating-result">
            <div class="hc-result-item">
                <span>Gereken Enerji:</span>
                <span class="hc-result-value" id="hc-res-wh-val">0 kWh</span>
            </div>
            <p class="hc-wh-note">Q = m * c * ΔT / Verim</p>
        </div>
    </div>
    <?php
}
