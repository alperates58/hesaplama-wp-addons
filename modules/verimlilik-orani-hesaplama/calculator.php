<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_verimlilik_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-efficiency',
        HC_PLUGIN_URL . 'modules/verimlilik-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-efficiency-css',
        HC_PLUGIN_URL . 'modules/verimlilik-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-efficiency">
        <h3>Verimlilik Oranı Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-ef-output">Gerçek Çıktı (Output)</label>
            <input type="number" id="hc-ef-output" value="80">
        </div>
        <div class="hc-form-group">
            <label for="hc-ef-input">Potansiyel/Girdi (Input)</label>
            <input type="number" id="hc-ef-input" value="100">
        </div>
        <button class="hc-btn" onclick="hcEfficiencyHesapla()">Verimliliği Gör</button>
        <div class="hc-result" id="hc-efficiency-result">
            <div class="hc-result-item">
                <span>Verimlilik:</span>
                <span class="hc-result-value" id="hc-res-ef-val">%0</span>
            </div>
            <p class="hc-ef-note">Formül: (Çıktı / Girdi) x 100</p>
        </div>
    </div>
    <?php
}
