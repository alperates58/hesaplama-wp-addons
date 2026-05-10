<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzey_gerilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yuzey-gerilimi-hesaplama',
        HC_PLUGIN_URL . 'modules/yuzey-gerilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yuzey-gerilimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yuzey-gerilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-surface-tension">
        <h3>Yüzey Gerilimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-st-h">Kılcal Yükselme (h, mm)</label>
            <input type="number" id="hc-st-h" placeholder="Örn: 20">
        </div>
        <div class="hc-form-group">
            <label for="hc-st-r">Kılcal Boru Yarıçapı (r, mm)</label>
            <input type="number" id="hc-st-r" placeholder="Örn: 0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-st-rho">Sıvı Yoğunluğu (g/cm³)</label>
            <input type="number" id="hc-st-rho" value="1.0">
        </div>
        <button class="hc-btn" onclick="hcYüzeyGerilimiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-st-result">
            <div class="hc-result-label">Yüzey Gerilimi (γ):</div>
            <div class="hc-result-value" id="hc-st-val">-</div>
        </div>
    </div>
    <?php
}
