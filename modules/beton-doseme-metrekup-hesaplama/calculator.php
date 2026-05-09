<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beton_doseme_metrekup_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beton-doseme-metrekup-hesaplama',
        HC_PLUGIN_URL . 'modules/beton-doseme-metrekup-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beton-doseme-metrekup-hesaplama-css',
        HC_PLUGIN_URL . 'modules/beton-doseme-metrekup-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-beton-doseme-metrekup-hesaplama">
        <h3>Beton Döşeme Hacim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bdm-length">Uzunluk (m)</label>
            <input type="number" id="hc-bdm-length" placeholder="Örn: 10" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bdm-width">Genişlik (m)</label>
            <input type="number" id="hc-bdm-width" placeholder="Örn: 8" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bdm-thick">Kalınlık (cm)</label>
            <input type="number" id="hc-bdm-thick" placeholder="Örn: 15" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bdm-waste">Fire Payı (%)</label>
            <input type="number" id="hc-bdm-waste" placeholder="Örn: 5" value="5">
        </div>
        <button class="hc-btn" onclick="hcBDMHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bdm-result">
            <div class="hc-result-label">Gereken Beton:</div>
            <div class="hc-result-value" id="hc-bdm-val">-</div>
            <div class="hc-result-note" id="hc-bdm-note"></div>
        </div>
    </div>
    <?php
}
