<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ebob_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ebob',
        HC_PLUGIN_URL . 'modules/ebob-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ebob-css',
        HC_PLUGIN_URL . 'modules/ebob-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ebob">
        <h3>EBOB Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-eb-s1">1. Sayı:</label>
            <input type="number" id="hc-eb-s1" placeholder="örn: 24">
        </div>
        <div class="hc-form-group">
            <label for="hc-eb-s2">2. Sayı:</label>
            <input type="number" id="hc-eb-s2" placeholder="örn: 36">
        </div>
        <button class="hc-btn" onclick="hcEbobHesapla()">EBOB Hesapla</button>
        <div class="hc-result" id="hc-ebob-result">
            <strong>En Büyük Ortak Bölen:</strong>
            <div id="hc-eb-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
