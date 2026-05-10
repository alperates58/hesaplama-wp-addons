<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mutasyon_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mut-rate',
        HC_PLUGIN_URL . 'modules/mutasyon-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mut-rate-css',
        HC_PLUGIN_URL . 'modules/mutasyon-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mut-rate">
        <h3>Mutasyon Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mr-mutants">Mutant Sayısı:</label>
            <input type="number" id="hc-mr-mutants" placeholder="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-mr-total">Toplam İncelenen Birey Sayısı:</label>
            <input type="number" id="hc-mr-total" placeholder="1000000">
        </div>
        <button class="hc-btn" onclick="hcMutRateHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mut-rate-result">
            <strong>Mutasyon Oranı:</strong>
            <div id="hc-mr-res-val" class="hc-result-value">-</div>
            <div id="hc-mr-res-exp" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
