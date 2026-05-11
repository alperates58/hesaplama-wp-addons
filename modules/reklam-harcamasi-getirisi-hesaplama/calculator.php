<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_reklam_harcamasi_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rhg-calc',
        HC_PLUGIN_URL . 'modules/reklam-harcamasi-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rhg-calc-css',
        HC_PLUGIN_URL . 'modules/reklam-harcamasi-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rhg">
        <h3>Reklam Harcaması Getirisi (ROAS)</h3>
        <div class="hc-form-group">
            <label for="hc-rhg-revenue">Reklam Kaynaklı Gelir (₺)</label>
            <input type="number" id="hc-rhg-revenue" placeholder="Örn: 25.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-rhg-spend">Reklam Harcaması (₺)</label>
            <input type="number" id="hc-rhg-spend" placeholder="Örn: 5.000">
        </div>
        <button class="hc-btn" onclick="hcRhgHesapla()">Getiriyi Hesapla</button>
        <div class="hc-result" id="hc-rhg-result">
            <div class="hc-result-item">
                <span>ROAS (Katsayı):</span>
                <strong class="hc-result-value" id="hc-rhg-value">-</strong>
            </div>
            <div class="hc-result-item">
                <span>ROAS (Yüzde):</span>
                <strong id="hc-rhg-percent">-</strong>
            </div>
        </div>
    </div>
    <?php
}
