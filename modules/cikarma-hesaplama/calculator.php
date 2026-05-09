<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_cikarma_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-cikarma-hesaplama', HC_PLUGIN_URL . 'modules/cikarma-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-cikarma-hesaplama-css', HC_PLUGIN_URL . 'modules/cikarma-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-cikarma-hesaplama">
        <h3>Çıkarma Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cik-a">İlk Sayı (Eksilen)</label>
            <input type="number" id="hc-cik-a" placeholder="örn. 100" step="any" />
        </div>
        <div class="hc-form-group">
            <label for="hc-cik-b">İkinci Sayı (Çıkan)</label>
            <input type="number" id="hc-cik-b" placeholder="örn. 37" step="any" />
        </div>
        <button class="hc-btn" onclick="hcCikarmaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cikarma-hesaplama-result"></div>
    </div>
    <?php
}
