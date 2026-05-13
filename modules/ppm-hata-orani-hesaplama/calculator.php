<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ppm_hata_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ppm-hata-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/ppm-hata-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ppm-hata-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ppm-hata-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ppm-hata-orani-hesaplama">
        <h3>PPM Hata Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ppm-defects">Hata Sayısı (Defects)</label>
            <input type="number" id="hc-ppm-defects" step="any" placeholder="Örn: 5">
        </div>
        <div class="hc-form-group">
            <label for="hc-ppm-total">Toplam Parça Sayısı (Units)</label>
            <input type="number" id="hc-ppm-total" step="any" placeholder="Örn: 100000">
        </div>
        <button class="hc-btn" onclick="hcPpmHataHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ppm-hata-orani-hesaplama-result">
            <span class="hc-label">Hata Oranı (PPM):</span>
            <div class="hc-result-value" id="hc-ppm-res-value">0</div>
            <div id="hc-ppm-res-percent"></div>
        </div>
    </div>
    <?php
}
