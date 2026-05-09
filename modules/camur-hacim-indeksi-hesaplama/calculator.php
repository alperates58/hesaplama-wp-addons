<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_camur_hacim_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-camur-hacim-indeksi-hesaplama',
        HC_PLUGIN_URL . 'modules/camur-hacim-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-camur-hacim-indeksi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/camur-hacim-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-camur-hacim-indeksi-hesaplama">
        <h3>Çamur Hacim İndeksi (SVI) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-svi-ssv">Çöken Çamur Hacmi - 30 dk (mL/L)</label>
            <input type="number" id="hc-svi-ssv" placeholder="Örn: 300" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-svi-mlss">MLSS Konsantrasyonu (mg/L)</label>
            <input type="number" id="hc-svi-mlss" placeholder="Örn: 2500" step="any">
        </div>
        <button class="hc-btn" onclick="hcSVIHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-svi-result">
            <div class="hc-result-label">SVI Değeri:</div>
            <div class="hc-result-value" id="hc-svi-val">-</div>
            <div class="hc-result-note" id="hc-svi-note"></div>
        </div>
    </div>
    <?php
}
