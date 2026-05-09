<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beton_boru_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beton-boru-hacmi-hesaplama',
        HC_PLUGIN_URL . 'modules/beton-boru-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beton-boru-hacmi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/beton-boru-hacmi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-beton-boru-hacmi-hesaplama">
        <h3>Beton Boru Hacim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bbh-inner">İç Çap (cm)</label>
            <input type="number" id="hc-bbh-inner" placeholder="Örn: 60" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bbh-thick">Et Kalınlığı (cm)</label>
            <input type="number" id="hc-bbh-thick" placeholder="Örn: 5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bbh-length">Boru Uzunluğu (m)</label>
            <input type="number" id="hc-bbh-length" placeholder="Örn: 2" step="any">
        </div>
        <button class="hc-btn" onclick="hcBBHHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bbh-result">
            <div class="hc-bbh-grid">
                <div class="hc-bbh-item">
                    <span class="hc-result-label">Beton Hacmi:</span>
                    <span class="hc-result-value" id="hc-bbh-concrete">-</span>
                </div>
                <div class="hc-bbh-item">
                    <span class="hc-result-label">İç Hacim (Su):</span>
                    <span class="hc-result-value" id="hc-bbh-water">-</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
