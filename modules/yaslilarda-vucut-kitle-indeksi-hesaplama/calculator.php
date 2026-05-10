<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yaslilarda_vucut_kitle_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vki-yasli',
        HC_PLUGIN_URL . 'modules/yaslilarda-vucut-kitle-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vki-yasli-css',
        HC_PLUGIN_URL . 'modules/yaslilarda-vucut-kitle-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vki-yasli">
        <h3>Yaşlılarda VKİ Hesaplama (65+)</h3>
        <div class="hc-form-group">
            <label for="hc-vky-height">Boy (cm):</label>
            <input type="number" id="hc-vky-height" placeholder="170">
        </div>
        <div class="hc-form-group">
            <label for="hc-vky-weight">Kilo (kg):</label>
            <input type="number" id="hc-vky-weight" placeholder="75">
        </div>
        <button class="hc-btn" onclick="hcVkiYasliHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vki-yasli-result">
            <strong>VKİ: <span id="hc-vky-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-vky-res-desc" style="margin-top:10px; font-weight:bold;"></div>
            <p style="font-size:0.85em; margin-top:10px; opacity:0.8;">Not: Yaşlılarda (65+) ideal VKİ aralığı 23-30 olarak kabul edilmektedir.</p>
        </div>
    </div>
    <?php
}
