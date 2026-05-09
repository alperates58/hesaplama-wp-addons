<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_dikdortgen_prizma_hacmi_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-dikdortgen-prizma-hacmi-hesaplama', HC_PLUGIN_URL . 'modules/dikdortgen-prizma-hacmi-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-dikdortgen-prizma-hacmi-hesaplama-css', HC_PLUGIN_URL . 'modules/dikdortgen-prizma-hacmi-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-dikdortgen-prizma-hacmi-hesaplama">
        <h3>Dikdörtgen Prizma Hacmi Hesaplama</h3>
        <div class="hc-form-group"><label for="hc-dph-en">En (m)</label><input type="number" id="hc-dph-en" placeholder="m" step="any" min="0" /></div>
        <div class="hc-form-group"><label for="hc-dph-boy">Boy (m)</label><input type="number" id="hc-dph-boy" placeholder="m" step="any" min="0" /></div>
        <div class="hc-form-group"><label for="hc-dph-yukseklik">Yükseklik (m)</label><input type="number" id="hc-dph-yukseklik" placeholder="m" step="any" min="0" /></div>
        <button class="hc-btn" onclick="hcDikdortgenPrizmaHacmiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dikdortgen-prizma-hacmi-hesaplama-result"></div>
    </div>
    <?php
}
