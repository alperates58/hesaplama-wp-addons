<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vucut_sekil_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-absi',
        HC_PLUGIN_URL . 'modules/vucut-sekil-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-absi-css',
        HC_PLUGIN_URL . 'modules/vucut-sekil-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-absi">
        <h3>Vücut Şekil İndeksi (ABSI)</h3>
        <div class="hc-form-group">
            <label for="hc-absi-waist">Bel Çevresi (m):</label>
            <input type="number" id="hc-absi-waist" placeholder="0.85" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-absi-height">Boy (m):</label>
            <input type="number" id="hc-absi-height" placeholder="1.75" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-absi-weight">Kilo (kg):</label>
            <input type="number" id="hc-absi-weight" placeholder="75">
        </div>
        <button class="hc-btn" onclick="hcAbsiHesapla()">ABSI Hesapla</button>
        <div class="hc-result" id="hc-absi-result">
            <strong>ABSI Değeri: <span id="hc-absi-res-val" class="hc-result-value">-</span></strong>
            <p style="font-size:0.85em; margin-top:10px; opacity:0.8;">A Body Shape Index (ABSI), bel çevresinin boy ve kiloya göre orantısını ölçer.</p>
        </div>
    </div>
    <?php
}
