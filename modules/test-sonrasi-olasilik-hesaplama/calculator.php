<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_test_sonrasi_olasilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-post-test',
        HC_PLUGIN_URL . 'modules/test-sonrasi-olasilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-post-test-css',
        HC_PLUGIN_URL . 'modules/test-sonrasi-olasilik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-post-test">
        <h3>Test Sonrası Olasılık</h3>
        <div class="hc-form-group">
            <label for="hc-pt-pre">Test Öncesi Olasılık (Pre-test) [%]</label>
            <input type="number" id="hc-pt-pre" value="5" step="0.1">
        </div>
        <div id="hc-pt-lr-mode" class="hc-form-group">
            <label for="hc-pt-lr">Olabilirlik Oranı (Likelihood Ratio +)</label>
            <input type="number" id="hc-pt-lr" value="10" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcPostTestHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-post-test-result">
            <div class="hc-result-item">
                <span>Test Sonrası Olasılık:</span>
                <span class="hc-result-value" id="hc-res-pt-val">%0</span>
            </div>
            <p class="hc-pt-note">Pozitif sonuç sonrası gerçek hastalık olasılığını odds-ratio yöntemiyle hesaplar.</p>
        </div>
    </div>
    <?php
}
