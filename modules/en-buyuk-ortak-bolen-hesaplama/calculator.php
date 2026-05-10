<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_en_buyuk_ortak_bolen_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ebob-alt',
        HC_PLUGIN_URL . 'modules/en-buyuk-ortak-bolen-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ebob-alt-css',
        HC_PLUGIN_URL . 'modules/en-buyuk-ortak-bolen-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ebob-alt">
        <h3>En Büyük Ortak Bölen Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-eba-s1">1. Sayı:</label>
            <input type="number" id="hc-eba-s1" placeholder="örn: 48">
        </div>
        <div class="hc-form-group">
            <label for="hc-eba-s2">2. Sayı:</label>
            <input type="number" id="hc-eba-s2" placeholder="örn: 60">
        </div>
        <button class="hc-btn" onclick="hcEbobAltHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ebob-alt-result">
            <strong>En Büyük Ortak Bölen (EBOB):</strong>
            <div id="hc-eba-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
