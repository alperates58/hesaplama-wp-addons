<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_poisson_dagilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-poisson-dagilimi-hesaplama',
        HC_PLUGIN_URL . 'modules/poisson-dagilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-poisson-dagilimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/poisson-dagilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-poisson-dagilimi-hesaplama">
        <h3>Poisson Dağılımı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-poisson-lambda">Ortalama Olay Sayısı (λ - Lambda)</label>
            <input type="number" id="hc-poisson-lambda" step="any" placeholder="λ > 0">
        </div>
        <div class="hc-form-group">
            <label for="hc-poisson-k">Gerçekleşen Olay Sayısı (k)</label>
            <input type="number" id="hc-poisson-k" step="1" placeholder="k >= 0">
        </div>
        <button class="hc-btn" onclick="hcPoissonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-poisson-dagilimi-hesaplama-result">
            <div id="hc-poisson-exact"></div>
            <div id="hc-poisson-less-equal"></div>
            <div id="hc-poisson-greater"></div>
        </div>
    </div>
    <?php
}
