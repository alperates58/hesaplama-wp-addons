<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_daire_dilimi_alani_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-daire-dilimi-alani-hesaplama', HC_PLUGIN_URL . 'modules/daire-dilimi-alani-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-daire-dilimi-alani-hesaplama-css', HC_PLUGIN_URL . 'modules/daire-dilimi-alani-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-daire-dilimi-alani-hesaplama">
        <h3>Daire Dilimi Alanı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dda-r">Yarıçap (m)</label>
            <input type="number" id="hc-dda-r" placeholder="m" step="any" min="0" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dda-aci">Merkez Açısı (°)</label>
            <input type="number" id="hc-dda-aci" placeholder="örn. 90" step="any" min="0" max="360" />
        </div>
        <button class="hc-btn" onclick="hcDaireDilimiAlaniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-daire-dilimi-alani-hesaplama-result"></div>
    </div>
    <?php
}
