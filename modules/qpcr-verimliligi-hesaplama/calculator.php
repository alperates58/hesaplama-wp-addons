<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_qpcr_verimliligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-qpcr-eff',
        HC_PLUGIN_URL . 'modules/qpcr-verimliligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-qpcr-eff-css',
        HC_PLUGIN_URL . 'modules/qpcr-verimliligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-qpcr-eff">
        <h3>qPCR Verimlilik Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-qe-slope">Eğri Eğimi (Slope):</label>
            <input type="number" id="hc-qe-slope" step="0.001" placeholder="-3.32">
        </div>
        <button class="hc-btn" onclick="hcQpcrEffHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-qpcr-eff-result">
            <strong>Verimlilik (E):</strong>
            <div id="hc-qe-res-val" class="hc-result-value">-</div>
            <span>%</span>
            <small style="display:block; margin-top:10px;">E = (10^(-1/slope) - 1) * 100</small>
        </div>
    </div>
    <?php
}
