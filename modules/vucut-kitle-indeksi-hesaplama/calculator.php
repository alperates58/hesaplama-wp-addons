<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vucut_kitle_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vki',
        HC_PLUGIN_URL . 'modules/vucut-kitle-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vki-css',
        HC_PLUGIN_URL . 'modules/vucut-kitle-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vki">
        <h3>Vücut Kitle İndeksi (VKİ) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-vki-height">Boy (cm):</label>
            <input type="number" id="hc-vki-height" placeholder="Örn: 175">
        </div>
        <div class="hc-form-group">
            <label for="hc-vki-weight">Kilo (kg):</label>
            <input type="number" id="hc-vki-weight" placeholder="Örn: 70" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcVkiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vki-result">
            <strong>VKİ Değeriniz: <span id="hc-vki-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-vki-res-desc" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
