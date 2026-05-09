<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_dikdortgen_cevre_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-dikdortgen-cevre-hesaplama', HC_PLUGIN_URL . 'modules/dikdortgen-cevre-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-dikdortgen-cevre-hesaplama-css', HC_PLUGIN_URL . 'modules/dikdortgen-cevre-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-dikdortgen-cevre-hesaplama">
        <h3>Dikdörtgen Çevre Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dch-en">En (m)</label>
            <input type="number" id="hc-dch-en" placeholder="m" step="any" min="0" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dch-boy">Boy (m)</label>
            <input type="number" id="hc-dch-boy" placeholder="m" step="any" min="0" />
        </div>
        <button class="hc-btn" onclick="hcDikdortgenCevreHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dikdortgen-cevre-hesaplama-result"></div>
    </div>
    <?php
}
