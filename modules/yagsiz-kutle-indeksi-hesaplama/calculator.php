<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yagsiz_kutle_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ffmi',
        HC_PLUGIN_URL . 'modules/yagsiz-kutle-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ffmi-css',
        HC_PLUGIN_URL . 'modules/yagsiz-kutle-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ffmi">
        <h3>Yağsız Kütle İndeksi (FFMI)</h3>
        <div class="hc-form-group">
            <label for="hc-ffmi-weight">Kilo (kg):</label>
            <input type="number" id="hc-ffmi-weight" placeholder="80">
        </div>
        <div class="hc-form-group">
            <label for="hc-ffmi-height">Boy (cm):</label>
            <input type="number" id="hc-ffmi-height" placeholder="180">
        </div>
        <div class="hc-form-group">
            <label for="hc-ffmi-fat">Vücut Yağ Oranı (%):</label>
            <input type="number" id="hc-ffmi-fat" placeholder="15">
        </div>
        <button class="hc-btn" onclick="hcFfmiHesapla()">FFMI Hesapla</button>
        <div class="hc-result" id="hc-ffmi-result">
            <strong>FFMI Değeriniz: <span id="hc-ffmi-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-ffmi-res-desc" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
