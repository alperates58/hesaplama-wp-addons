<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_e_uzeri_x_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-e-uzeri-x-hesaplama', HC_PLUGIN_URL . 'modules/e-uzeri-x-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-e-uzeri-x-hesaplama-css', HC_PLUGIN_URL . 'modules/e-uzeri-x-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-e-uzeri-x-hesaplama">
        <h3>e Üzeri x Hesaplama</h3>
        <div class="hc-form-group"><label for="hc-eux-x">Üs (x)</label><input type="number" id="hc-eux-x" placeholder="örn. 2" step="any" /></div>
        <button class="hc-btn" onclick="hcEUzeriXHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-e-uzeri-x-hesaplama-result"></div>
    </div>
    <?php
}
