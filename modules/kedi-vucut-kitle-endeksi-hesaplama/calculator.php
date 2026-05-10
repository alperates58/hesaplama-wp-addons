<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kedi_vucut_kitle_endeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kedi-vki',
        HC_PLUGIN_URL . 'modules/kedi-vucut-kitle-endeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kedi-vki-css',
        HC_PLUGIN_URL . 'modules/kedi-vucut-kitle-endeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kedi-vki">
        <h3>Kedi FBMI Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kvki-rib">Göğüs Çevresi (cm):</label>
            <input type="number" id="hc-kvki-rib" step="0.1" placeholder="35">
            <small>9. kaburga hizasından ölçülür.</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-kvki-leg">Arka Bacak Boyu (cm):</label>
            <input type="number" id="hc-kvki-leg" step="0.1" placeholder="15">
            <small>Diz kapağından topuğa kadar olan mesafe.</small>
        </div>
        <button class="hc-btn" onclick="hcKediVkiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kedi-vki-result">
            <strong>FBMI Değeri: <span id="hc-kvki-res-val">-</span></strong>
            <div id="hc-kvki-res-status" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
