<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_genclerde_vucut_kitle_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vki-genc',
        HC_PLUGIN_URL . 'modules/genclerde-vucut-kitle-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vki-genc-css',
        HC_PLUGIN_URL . 'modules/genclerde-vucut-kitle-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vki-genc">
        <h3>Gençlerde VKİ Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-vkg-height">Boy (cm):</label>
            <input type="number" id="hc-vkg-height" placeholder="170">
        </div>
        <div class="hc-form-group">
            <label for="hc-vkg-weight">Kilo (kg):</label>
            <input type="number" id="hc-vkg-weight" placeholder="65">
        </div>
        <button class="hc-btn" onclick="hcVkiGencHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vki-genc-result">
            <strong>VKİ: <span id="hc-vkg-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-vkg-res-desc" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
