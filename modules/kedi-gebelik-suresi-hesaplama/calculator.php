<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kedi_gebelik_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kedi-gebelik-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/kedi-gebelik-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kedi-gebelik-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kedi-gebelik-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kedi-gebelik-suresi-hesaplama">
        <h3>Kedi Gebelik Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cat-date">Çiftleşme Tarihi</label>
            <input type="date" id="hc-cat-date">
        </div>
        <button class="hc-btn" onclick="hcKediGebelikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cat-result">
            <div class="hc-result-label">Tahmini Doğum Tarihi:</div>
            <div class="hc-result-value" id="hc-cat-val">-</div>
            <div class="hc-result-note" id="hc-cat-note"></div>
        </div>
    </div>
    <?php
}
