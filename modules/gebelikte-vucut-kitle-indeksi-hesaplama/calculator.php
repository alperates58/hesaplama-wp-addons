<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gebelikte_vucut_kitle_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-preg-vki',
        HC_PLUGIN_URL . 'modules/gebelikte-vucut-kitle-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-preg-vki-css',
        HC_PLUGIN_URL . 'modules/gebelikte-vucut-kitle-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-preg-vki">
        <h3>Gebelikte İdeal Kilo Alımı</h3>
        <div class="hc-form-group">
            <label for="hc-pv-height">Boy (cm):</label>
            <input type="number" id="hc-pv-height" placeholder="165">
        </div>
        <div class="hc-form-group">
            <label for="hc-pv-weight">Gebelik Öncesi Kilo (kg):</label>
            <input type="number" id="hc-pv-weight" placeholder="60">
        </div>
        <button class="hc-btn" onclick="hcPregVkiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-preg-vki-result">
            <strong>Gebelik Öncesi VKİ: <span id="hc-pv-res-vki">-</span></strong>
            <div id="hc-pv-res-desc" style="margin:10px 0; font-weight:bold;"></div>
            <strong>Önerilen Toplam Kilo Alımı:</strong>
            <div id="hc-pv-res-range" class="hc-result-value">-</div>
            <span>kg</span>
        </div>
    </div>
    <?php
}
