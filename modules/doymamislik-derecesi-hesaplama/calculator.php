<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_doymamislik_derecesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-iodine',
        HC_PLUGIN_URL . 'modules/doymamislik-derecesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-iodine-css',
        HC_PLUGIN_URL . 'modules/doymamislik-derecesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-iodine">
        <h3>İyot İndisi (Doymamışlık) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ii-vb">Şahit Titrasyon Sarfiyatı (Vb - ml)</label>
            <input type="number" id="hc-ii-vb" placeholder="ml" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ii-vs">Numune Titrasyon Sarfiyatı (Vs - ml)</label>
            <input type="number" id="hc-ii-vs" placeholder="ml" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ii-n">Tiyosülfat Normalitesi (N)</label>
            <input type="number" id="hc-ii-n" placeholder="N" value="0.1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ii-m">Numune Miktarı (m - g)</label>
            <input type="number" id="hc-ii-m" placeholder="g" step="any">
        </div>
        <button class="hc-btn" onclick="hcIIHesapla()">İyot İndisi Hesapla</button>
        <div class="hc-result" id="hc-ii-result">
            <div class="hc-result-label">İyot İndisi (g I₂/100g):</div>
            <div class="hc-result-value" id="hc-ii-val">-</div>
            <div class="hc-result-note">IV = (Vb - Vs) * N * 12.69 / m</div>
        </div>
    </div>
    <?php
}
