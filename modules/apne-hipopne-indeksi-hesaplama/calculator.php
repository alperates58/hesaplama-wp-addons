<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_apne_hipopne_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ahi-calc',
        HC_PLUGIN_URL . 'modules/apne-hipopne-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ahi-calc-css',
        HC_PLUGIN_URL . 'modules/apne-hipopne-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ahi">
        <h3>Apne Hipopne İndeksi (AHI)</h3>
        <div class="hc-form-group">
            <label for="hc-ahi-events">Toplam Apne ve Hipopne Sayısı:</label>
            <input type="number" id="hc-ahi-events" placeholder="Örn: 120">
        </div>
        <div class="hc-form-group">
            <label for="hc-ahi-hours">Toplam Uyku Süresi (Saat):</label>
            <input type="number" id="hc-ahi-hours" placeholder="Örn: 7.5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcAhiHesapla()">AHI Hesapla</button>
        <div class="hc-result" id="hc-ahi-result">
            <strong>AHI Değeri: <span id="hc-ahi-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-ahi-res-desc" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
