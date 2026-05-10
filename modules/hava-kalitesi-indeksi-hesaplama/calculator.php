<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hava_kalitesi_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hava-kalitesi-indeksi-hesaplama',
        HC_PLUGIN_URL . 'modules/hava-kalitesi-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hava-kalitesi-indeksi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hava-kalitesi-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aqi">
        <h3>Hava Kalitesi İndeksi (AQI)</h3>
        <div class="hc-form-group">
            <label for="hc-aq-pm25">PM2.5 Konsantrasyonu (µg/m³)</label>
            <input type="number" id="hc-aq-pm25" placeholder="Örn: 12">
        </div>
        <div class="hc-form-group">
            <label for="hc-aq-pm10">PM10 Konsantrasyonu (µg/m³)</label>
            <input type="number" id="hc-aq-pm10" placeholder="Örn: 20">
        </div>
        <button class="hc-btn" onclick="hcHavaKalitesiİndeksiHesapla()">AQI Hesapla</button>
        <div class="hc-result" id="hc-aq-result">
            <div class="hc-result-label">AQI Değeri:</div>
            <div class="hc-result-value" id="hc-aq-val">-</div>
            <p id="hc-aq-status" style="margin-top:10px; font-weight:bold;"></p>
            <p id="hc-aq-desc" style="font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
