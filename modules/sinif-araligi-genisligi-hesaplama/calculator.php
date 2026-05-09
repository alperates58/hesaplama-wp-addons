<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sinif_araligi_genisligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-class-width',
        HC_PLUGIN_URL . 'modules/sinif-araligi-genisligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-class-width-css',
        HC_PLUGIN_URL . 'modules/sinif-araligi-genisligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-class-width">
        <h3>Sınıf Aralığı Genişliği</h3>
        <div class="hc-form-group">
            <label for="hc-cw-max">Maksimum Değer</label>
            <input type="number" id="hc-cw-max" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-cw-min">Minimum Değer</label>
            <input type="number" id="hc-cw-min" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-cw-k">Sınıf Sayısı (k)</label>
            <input type="number" id="hc-cw-k" value="5" min="1">
        </div>
        <button class="hc-btn" onclick="hcClassWidthHesapla()">Genişliği Hesapla</button>
        <div class="hc-result" id="hc-class-width-result">
            <div class="hc-result-item">
                <span>Sınıf Genişliği (h):</span>
                <span class="hc-result-value" id="hc-res-cw-val">0</span>
            </div>
            <p class="hc-cw-note">Formül: (Maks - Min) / Sınıf Sayısı</p>
        </div>
    </div>
    <?php
}
