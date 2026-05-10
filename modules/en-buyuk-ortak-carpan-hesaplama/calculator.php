<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_en_buyuk_ortak_carpan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-eboc',
        HC_PLUGIN_URL . 'modules/en-buyuk-ortak-carpan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-eboc-css',
        HC_PLUGIN_URL . 'modules/en-buyuk-ortak-carpan-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-eboc">
        <h3>En Büyük Ortak Çarpan Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ec-s1">1. Sayı:</label>
            <input type="number" id="hc-ec-s1" placeholder="örn: 45">
        </div>
        <div class="hc-form-group">
            <label for="hc-ec-s2">2. Sayı:</label>
            <input type="number" id="hc-ec-s2" placeholder="örn: 75">
        </div>
        <button class="hc-btn" onclick="hcEbocHesapla()">Çarpanı Hesapla</button>
        <div class="hc-result" id="hc-eboc-result">
            <strong>En Büyük Ortak Çarpan:</strong>
            <div id="hc-ec-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
