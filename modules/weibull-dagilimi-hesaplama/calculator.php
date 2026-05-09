<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_weibull_dagilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-weibull',
        HC_PLUGIN_URL . 'modules/weibull-dagilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-weibull-css',
        HC_PLUGIN_URL . 'modules/weibull-dagilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-weibull">
        <h3>Weibull Olasılık Dağılımı</h3>
        <div class="hc-form-group">
            <label for="hc-wd-x">Zaman / Değer (x)</label>
            <input type="number" id="hc-wd-x" value="10" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-wd-shape">Şekil Parametresi (k - Shape)</label>
            <input type="number" id="hc-wd-shape" value="1.5" step="0.1" min="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-wd-scale">Ölçek Parametresi (λ - Scale)</label>
            <input type="number" id="hc-wd-scale" value="20" step="0.1" min="0.1">
        </div>
        <button class="hc-btn" onclick="hcWeibullHesapla()">PDF / CDF Hesapla</button>
        <div class="hc-result" id="hc-weibull-result">
            <div class="hc-result-item"> <span>Olasılık Yoğunluk (PDF):</span> <b id="hc-res-wd-pdf">0</b> </div>
            <div class="hc-result-item"> <span>Birikimli Dağılım (CDF):</span> <b id="hc-res-wd-cdf">0</b> </div>
        </div>
    </div>
    <?php
}
