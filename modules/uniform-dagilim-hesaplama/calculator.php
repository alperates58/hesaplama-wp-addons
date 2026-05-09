<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uniform_dagilim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-unif-dist',
        HC_PLUGIN_URL . 'modules/uniform-dagilim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-unif-dist-css',
        HC_PLUGIN_URL . 'modules/uniform-dagilim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-unif-dist">
        <h3>Uniform Dağılım</h3>
        <div class="hc-form-group">
            <label for="hc-ud-a">Alt Sınır (a)</label>
            <input type="number" id="hc-ud-a" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ud-b">Üst Sınır (b)</label>
            <input type="number" id="hc-ud-b" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-ud-x">Sorgulanan Değer (x)</label>
            <input type="number" id="hc-ud-x" value="5">
        </div>
        <button class="hc-btn" onclick="hcUniformDistHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-unif-dist-result">
            <div class="hc-result-item"> <span>Olasılık (PDF):</span> <b id="hc-res-ud-pdf">0</b> </div>
            <div class="hc-result-item"> <span>Birikimli Olasılık (P(X ≤ x)):</span> <b id="hc-res-ud-cdf">0</b> </div>
        </div>
    </div>
    <?php
}
