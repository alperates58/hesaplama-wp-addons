<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_dikdortgen_alan_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-dikdortgen-alan-hesaplama', HC_PLUGIN_URL . 'modules/dikdortgen-alan-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-dikdortgen-alan-hesaplama-css', HC_PLUGIN_URL . 'modules/dikdortgen-alan-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-dikdortgen-alan-hesaplama">
        <h3>Dikdörtgen Alan Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dah-en">En (m)</label>
            <input type="number" id="hc-dah-en" placeholder="m" step="any" min="0" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dah-boy">Boy (m)</label>
            <input type="number" id="hc-dah-boy" placeholder="m" step="any" min="0" />
        </div>
        <button class="hc-btn" onclick="hcDikdortgenAlanHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dikdortgen-alan-hesaplama-result"></div>
    </div>
    <?php
}
