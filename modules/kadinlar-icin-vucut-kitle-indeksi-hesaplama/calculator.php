<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kadinlar_icin_vucut_kitle_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vki-kadin',
        HC_PLUGIN_URL . 'modules/kadinlar-icin-vucut-kitle-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vki-kadin-css',
        HC_PLUGIN_URL . 'modules/kadinlar-icin-vucut-kitle-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vki-kadin">
        <h3>Kadınlar İçin VKİ Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-vkk-height">Boy (cm):</label>
            <input type="number" id="hc-vkk-height" placeholder="Örn: 165">
        </div>
        <div class="hc-form-group">
            <label for="hc-vkk-weight">Kilo (kg):</label>
            <input type="number" id="hc-vkk-weight" placeholder="Örn: 60" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcVkiKadinHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vki-kadin-result">
            <strong>VKİ Değeriniz: <span id="hc-vkk-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-vkk-res-desc" style="margin-top:10px; font-weight:bold;"></div>
            <p style="font-size:0.85em; margin-top:10px; opacity:0.8;">Not: Kadınlarda vücut yağ oranı genellikle erkeklerden yüksektir; bu hesaplama genel referansları baz alır.</p>
        </div>
    </div>
    <?php
}
