<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_transistor_bias_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-transistor-bias',
        HC_PLUGIN_URL . 'modules/transistor-bias-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-transistor-bias-css',
        HC_PLUGIN_URL . 'modules/transistor-bias-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-transistor-bias">
        <h3>BJT Bias (Gerilim Bölücü)</h3>
        <div class="hc-form-group">
            <label for="hc-tb-vcc">Besleme (Vcc) [Volt]</label>
            <input type="number" id="hc-tb-vcc" value="12">
        </div>
        <div class="hc-form-group">
            <label for="hc-tb-r1">R1 Direnci [Ω]</label>
            <input type="number" id="hc-tb-r1" value="10000">
        </div>
        <div class="hc-form-group">
            <label for="hc-tb-r2">R2 Direnci [Ω]</label>
            <input type="number" id="hc-tb-r2" value="2200">
        </div>
        <div class="hc-form-group">
            <label for="hc-tb-re">Emitör Direnci (Re) [Ω]</label>
            <input type="number" id="hc-tb-re" value="1000">
        </div>
        <button class="hc-btn" onclick="hcTransistorBiasHesapla()">Bias Hesapla</button>
        <div class="hc-result" id="hc-transistor-bias-result">
            <div class="hc-result-item">
                <span>Baz Gerilimi (VB):</span>
                <span id="hc-res-tb-vb">0 V</span>
            </div>
            <div class="hc-result-item">
                <span>Kolektör Akımı (IC):</span>
                <span class="hc-result-value" id="hc-res-tb-ic">0 mA</span>
            </div>
        </div>
    </div>
    <?php
}
