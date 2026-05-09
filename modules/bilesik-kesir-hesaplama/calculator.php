<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bilesik_kesir_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-improper-frac',
        HC_PLUGIN_URL . 'modules/bilesik-kesir-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-improper-frac-css',
        HC_PLUGIN_URL . 'modules/bilesik-kesir-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-improper">
        <h3>Tam Sayılı Kesri Bileşiğe Çevir</h3>
        
        <div class="hc-fraction-input">
            <input type="number" id="hc-if-whole" placeholder="Tam" step="1">
            <div class="hc-frac-parts">
                <input type="number" id="hc-if-num" placeholder="Pay" step="1">
                <hr>
                <input type="number" id="hc-if-den" placeholder="Payda" step="1">
            </div>
        </div>

        <button class="hc-btn" onclick="hcBilesikKesirHesapla()">Dönüştür</button>

        <div class="hc-result" id="hc-if-result">
            <div class="hc-result-item">
                <span>Bileşik Kesir:</span>
                <span class="hc-result-value highlight" id="hc-res-if-val">-</span>
            </div>
        </div>
    </div>
    <?php
}
