<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rms_gerilim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rms-volt',
        HC_PLUGIN_URL . 'modules/rms-gerilim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rms-volt-css',
        HC_PLUGIN_URL . 'modules/rms-gerilim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rms-volt">
        <h3>RMS Gerilim Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-rv-val">Tepe Gerilimi (Vp) [Volt]</label>
            <input type="number" id="hc-rv-val" value="311" oninput="hcRmsVoltHesapla()">
        </div>
        <div class="hc-result visible" id="hc-rms-volt-result">
            <div class="hc-result-item">
                <span>RMS Gerilimi (Vrms):</span>
                <span class="hc-result-value" id="hc-res-rv-rms">220 V</span>
            </div>
            <div class="hc-result-item">
                <span>Tepeden Tepeye (Vpp):</span>
                <span id="hc-res-rv-pp">622 V</span>
            </div>
            <p class="hc-rv-note">Sinüzoidal dalga için: Vrms = Vp / √2</p>
        </div>
    </div>
    <?php
}
