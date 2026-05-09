<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_carpma_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-carpma-hesaplama', HC_PLUGIN_URL . 'modules/carpma-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-carpma-hesaplama-css', HC_PLUGIN_URL . 'modules/carpma-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-carpma-hesaplama">
        <h3>Çarpma Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cpm-a">Çarpan 1</label>
            <input type="number" id="hc-cpm-a" placeholder="örn. 25" step="any" />
        </div>
        <div class="hc-form-group">
            <label for="hc-cpm-b">Çarpan 2</label>
            <input type="number" id="hc-cpm-b" placeholder="örn. 48" step="any" />
        </div>
        <button class="hc-btn" onclick="hcCarpmaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-carpma-hesaplama-result"></div>
    </div>
    <?php
}
