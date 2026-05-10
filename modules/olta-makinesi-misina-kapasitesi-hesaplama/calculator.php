<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_olta_makinesi_misina_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fishing-line',
        HC_PLUGIN_URL . 'modules/olta-makinesi-misina-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fishing-line-css',
        HC_PLUGIN_URL . 'modules/olta-makinesi-misina-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fishing-line">
        <h3>Misina Kapasitesi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-fl-orig-dia">Orijinal Misina Çapı (mm):</label>
            <input type="number" id="hc-fl-orig-dia" step="0.01" placeholder="0.30">
        </div>
        <div class="hc-form-group">
            <label for="hc-fl-orig-len">Orijinal Kapasite (Metre):</label>
            <input type="number" id="hc-fl-orig-len" placeholder="200">
        </div>
        <div class="hc-form-group">
            <label for="hc-fl-new-dia">Yeni Misina Çapı (mm):</label>
            <input type="number" id="hc-fl-new-dia" step="0.01" placeholder="0.20">
        </div>
        <button class="hc-btn" onclick="hcFishingLineHesapla()">Kapasiteyi Hesapla</button>
        <div class="hc-result" id="hc-fishing-line-result">
            <strong>Yeni Misina Kapasitesi:</strong>
            <div id="hc-fl-res-val" class="hc-result-value">-</div>
            <span>Metre</span>
        </div>
    </div>
    <?php
}
