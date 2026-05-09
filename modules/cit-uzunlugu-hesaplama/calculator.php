<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cit_uzunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cit-uzunlugu-hesaplama',
        HC_PLUGIN_URL . 'modules/cit-uzunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cit-uzunlugu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cit-uzunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cit-uzunlugu-hesaplama">
        <h3>Mevcut Malzeme ile Çit Uzunluğu</h3>
        <div class="hc-form-group">
            <label for="hc-cu-posts">Mevcut Direk Sayısı (Adet)</label>
            <input type="number" id="hc-cu-posts" placeholder="Örn: 21">
        </div>
        <div class="hc-form-group">
            <label for="hc-cu-spacing">Planlanan Direk Aralığı (m)</label>
            <input type="number" id="hc-cu-spacing" value="2.5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcCUHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cu-result">
            <div class="hc-result-label">Yapılabilecek Çit Uzunluğu:</div>
            <div class="hc-result-value" id="hc-cu-val">-</div>
            <div class="hc-result-note">Uzunluk = (Direk Sayısı - 1) * Aralarındaki Mesafe</div>
        </div>
    </div>
    <?php
}
