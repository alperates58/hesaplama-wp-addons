<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sapka_bedeni_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hat-size',
        HC_PLUGIN_URL . 'modules/sapka-bedeni-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hat-size-css',
        HC_PLUGIN_URL . 'modules/sapka-bedeni-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hat-size">
        <h3>Şapka Bedeni Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-hat-circ">Baş Çevresi (cm)</label>
            <input type="number" id="hc-hat-circ" placeholder="Örn: 58" step="0.1" min="40">
        </div>
        <button class="hc-btn" onclick="hcHatSizeHesapla()">Bedeni Bul</button>
        <div class="hc-result" id="hc-hat-size-result">
            <div class="hc-result-item">
                <span>Şapka Bedeniniz:</span>
                <span class="hc-result-value" id="hc-res-hat-val">-</span>
            </div>
            <div class="hc-hat-chart">
                <p>US Ölçüsü: <b id="hc-res-hat-us">-</b></p>
                <p>UK Ölçüsü: <b id="hc-res-hat-uk">-</b></p>
            </div>
        </div>
    </div>
    <?php
}
