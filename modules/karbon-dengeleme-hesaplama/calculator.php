<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karbon_dengeleme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-karbon-dengeleme-hesaplama',
        HC_PLUGIN_URL . 'modules/karbon-dengeleme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-karbon-dengeleme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/karbon-dengeleme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-offset">
        <h3>Karbon Dengeleme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-os-footprint">Yıllık Karbon Ayak İzini (Ton CO₂e)</label>
            <input type="number" id="hc-os-footprint" placeholder="Örn: 5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcKarbonDengelemeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-os-result">
            <div id="hc-os-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
