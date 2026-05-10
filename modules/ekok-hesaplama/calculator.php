<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ekok_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ekok',
        HC_PLUGIN_URL . 'modules/ekok-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ekok-css',
        HC_PLUGIN_URL . 'modules/ekok-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ekok">
        <h3>EKOK Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ek-s1">1. Sayı:</label>
            <input type="number" id="hc-ek-s1" placeholder="örn: 12">
        </div>
        <div class="hc-form-group">
            <label for="hc-ek-s2">2. Sayı:</label>
            <input type="number" id="hc-ek-s2" placeholder="örn: 15">
        </div>
        <button class="hc-btn" onclick="hcEkokHesapla()">EKOK Hesapla</button>
        <div class="hc-result" id="hc-ekok-result">
            <strong>En Küçük Ortak Kat:</strong>
            <div id="hc-ek-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
