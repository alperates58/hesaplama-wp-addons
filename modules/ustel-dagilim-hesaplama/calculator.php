<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ustel_dagilim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-exp-dist',
        HC_PLUGIN_URL . 'modules/ustel-dagilim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-exp-dist-css',
        HC_PLUGIN_URL . 'modules/ustel-dagilim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-exp-dist">
        <h3>Üstel Dağılım</h3>
        <div class="hc-form-group">
            <label for="hc-ed-x">Zaman / Değer (x)</label>
            <input type="number" id="hc-ed-x" value="5" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ed-rate">Oran Parametresi (λ - Lambda)</label>
            <input type="number" id="hc-ed-rate" value="0.5" step="0.1" min="0.0001">
        </div>
        <button class="hc-btn" onclick="hcExpDistHesapla()">PDF / CDF Hesapla</button>
        <div class="hc-result" id="hc-exp-dist-result">
            <div class="hc-result-item"> <span>Olasılık Yoğunluk (PDF):</span> <b id="hc-res-ed-pdf">0</b> </div>
            <div class="hc-result-item"> <span>Birikimli Dağılım (CDF):</span> <b id="hc-res-ed-cdf">0</b> </div>
        </div>
    </div>
    <?php
}
