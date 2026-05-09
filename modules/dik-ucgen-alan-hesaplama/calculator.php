<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_dik_ucgen_alan_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-dik-ucgen-alan-hesaplama', HC_PLUGIN_URL . 'modules/dik-ucgen-alan-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-dik-ucgen-alan-hesaplama-css', HC_PLUGIN_URL . 'modules/dik-ucgen-alan-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-dik-ucgen-alan-hesaplama">
        <h3>Dik Üçgen Alan Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dua-a">Dik Kenar a (m)</label>
            <input type="number" id="hc-dua-a" placeholder="m" step="any" min="0" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dua-b">Dik Kenar b (m)</label>
            <input type="number" id="hc-dua-b" placeholder="m" step="any" min="0" />
        </div>
        <button class="hc-btn" onclick="hcDikUcgenAlanHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dik-ucgen-alan-hesaplama-result"></div>
    </div>
    <?php
}
