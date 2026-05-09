<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_dorduncu_dereceden_kok_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-dorduncu-dereceden-kok-hesaplama', HC_PLUGIN_URL . 'modules/dorduncu-dereceden-kok-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-dorduncu-dereceden-kok-hesaplama-css', HC_PLUGIN_URL . 'modules/dorduncu-dereceden-kok-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-dorduncu-dereceden-kok-hesaplama">
        <h3>Dördüncü Dereceden Kök Hesaplama</h3>
        <div class="hc-form-group"><label for="hc-ddk-sayi">Sayı (x ≥ 0)</label><input type="number" id="hc-ddk-sayi" placeholder="örn. 81" step="any" min="0" /></div>
        <button class="hc-btn" onclick="hcDorduncuKokHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dorduncu-dereceden-kok-hesaplama-result"></div>
    </div>
    <?php
}
