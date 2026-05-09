<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_durma_mesafesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-durma-mesafesi-hesaplama',
        HC_PLUGIN_URL . 'modules/durma-mesafesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-durma-mesafesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/durma-mesafesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-durma-mesafesi-hesaplama">
        <h3>Durma Mesafesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dm-v">İlk Hız (v₀ - m/s)</label>
            <input type="number" id="hc-dm-v" placeholder="Örn: 20" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dm-a">Yavaşlama İvmesi (a - m/s²)</label>
            <input type="number" id="hc-dm-a" placeholder="Örn: 5" step="any">
        </div>
        <button class="hc-btn" onclick="hcDMHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dm-result">
            <div class="hc-result-label">Durma Mesafesi (d):</div>
            <div class="hc-result-value" id="hc-dm-val">-</div>
            <div class="hc-result-note">d = v₀² / (2 * a)</div>
        </div>
    </div>
    <?php
}
