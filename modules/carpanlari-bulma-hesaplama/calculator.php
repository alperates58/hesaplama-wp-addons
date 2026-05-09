<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_carpanlari_bulma_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-carpanlari-bulma-hesaplama', HC_PLUGIN_URL . 'modules/carpanlari-bulma-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-carpanlari-bulma-hesaplama-css', HC_PLUGIN_URL . 'modules/carpanlari-bulma-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-carpanlari-bulma-hesaplama">
        <h3>Çarpanları Bulma Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cbh-sayi">Sayı</label>
            <input type="number" id="hc-cbh-sayi" placeholder="örn. 360" min="2" step="1" />
        </div>
        <button class="hc-btn" onclick="hcCarpanlariHesapla()">Çarpanlara Ayır</button>
        <div class="hc-result" id="hc-carpanlari-bulma-hesaplama-result"></div>
    </div>
    <?php
}
