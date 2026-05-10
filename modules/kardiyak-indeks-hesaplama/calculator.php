<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kardiyak_indeks_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kardiyak-indeks-hesaplama',
        HC_PLUGIN_URL . 'modules/kardiyak-indeks-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kardiyak-indeks-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kardiyak-indeks-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cardiac-index">
        <h3>Kardiyak İndeks (CI)</h3>
        <div class="hc-form-group">
            <label for="hc-ci-co">Kalp Debisi (L/dk)</label>
            <input type="number" id="hc-ci-co" placeholder="5.0" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ci-bsa">Vücut Yüzey Alanı (BSA) (m²)</label>
            <input type="number" id="hc-ci-bsa" placeholder="1.8" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcKardiyakİndeksHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ci-result">
            <div class="hc-result-label">Kardiyak İndeks:</div>
            <div class="hc-result-value" id="hc-ci-val">-</div>
        </div>
    </div>
    <?php
}
