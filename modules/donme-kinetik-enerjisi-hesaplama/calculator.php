<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_donme_kinetik_enerjisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-donme-kinetik-enerjisi-hesaplama',
        HC_PLUGIN_URL . 'modules/donme-kinetik-enerjisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-donme-kinetik-enerjisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/donme-kinetik-enerjisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-donme-kinetik-enerjisi-hesaplama">
        <h3>Dönme Kinetik Enerjisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dke-i">Eylemsizlik Momenti (I - kg·m²)</label>
            <input type="number" id="hc-dke-i" placeholder="Örn: 0.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dke-w">Açısal Hız (ω - rad/s)</label>
            <input type="number" id="hc-dke-w" placeholder="Örn: 10" step="any">
        </div>
        <button class="hc-btn" onclick="hcDKEHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dke-result">
            <div class="hc-result-label">Dönme Kinetik Enerjisi (E):</div>
            <div class="hc-result-value" id="hc-dke-val">-</div>
            <div class="hc-result-note">E = 0.5 * I * ω²</div>
        </div>
    </div>
    <?php
}
