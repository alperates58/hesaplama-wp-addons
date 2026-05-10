<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_en_kucuk_ortak_kat_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ekok-alt',
        HC_PLUGIN_URL . 'modules/en-kucuk-ortak-kat-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ekok-alt-css',
        HC_PLUGIN_URL . 'modules/en-kucuk-ortak-kat-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ekok-alt">
        <h3>En Küçük Ortak Kat Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-eka-s1">1. Sayı:</label>
            <input type="number" id="hc-eka-s1" placeholder="örn: 18">
        </div>
        <div class="hc-form-group">
            <label for="hc-eka-s2">2. Sayı:</label>
            <input type="number" id="hc-eka-s2" placeholder="örn: 24">
        </div>
        <button class="hc-btn" onclick="hcEkokAltHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ekok-alt-result">
            <strong>En Küçük Ortak Kat (EKOK):</strong>
            <div id="hc-eka-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
