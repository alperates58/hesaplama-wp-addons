<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_dikdortgen_alan_cevre_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-dikdortgen-alan-cevre-hesaplama', HC_PLUGIN_URL . 'modules/dikdortgen-alan-cevre-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-dikdortgen-alan-cevre-hesaplama-css', HC_PLUGIN_URL . 'modules/dikdortgen-alan-cevre-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-dikdortgen-alan-cevre-hesaplama">
        <h3>Dikdörtgen Alan Çevre Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dac-en">En (m)</label>
            <input type="number" id="hc-dac-en" placeholder="m" step="any" min="0" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dac-boy">Boy (m)</label>
            <input type="number" id="hc-dac-boy" placeholder="m" step="any" min="0" />
        </div>
        <button class="hc-btn" onclick="hcDikdortgenAlanCevreHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dikdortgen-alan-cevre-hesaplama-result"></div>
    </div>
    <?php
}
