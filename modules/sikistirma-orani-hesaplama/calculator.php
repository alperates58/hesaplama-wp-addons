<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sikistirma_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-compression-ratio',
        HC_PLUGIN_URL . 'modules/sikistirma-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-compression-ratio-css',
        HC_PLUGIN_URL . 'modules/sikistirma-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-compression-ratio">
        <h3>Sıkıştırma Oranı (CR)</h3>
        <div class="hc-form-group">
            <label for="hc-cr-stroke">Silindir Hacmi (Vd) [cc]</label>
            <input type="number" id="hc-cr-stroke" value="450">
        </div>
        <div class="hc-form-group">
            <label for="hc-cr-comb">Yanma Odası Hacmi (Vc) [cc]</label>
            <input type="number" id="hc-cr-comb" value="50">
        </div>
        <button class="hc-btn" onclick="hcCompressionRatioHesapla()">Oranı Hesapla</button>
        <div class="hc-result" id="hc-compression-ratio-result">
            <div class="hc-result-item">
                <span>Sıkıştırma Oranı:</span>
                <span class="hc-result-value" id="hc-res-cr-val">10:1</span>
            </div>
            <p class="hc-cr-note">CR = (Vd + Vc) / Vc</p>
        </div>
    </div>
    <?php
}
