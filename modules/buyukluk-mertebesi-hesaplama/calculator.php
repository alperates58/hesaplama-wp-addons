<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_buyukluk_mertebesi_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-buyukluk-mertebesi-hesaplama', HC_PLUGIN_URL . 'modules/buyukluk-mertebesi-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-buyukluk-mertebesi-hesaplama-css', HC_PLUGIN_URL . 'modules/buyukluk-mertebesi-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-buyukluk-mertebesi-hesaplama">
        <h3>Büyüklük Mertebesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bme-sayi">Sayı</label>
            <input type="number" id="hc-bme-sayi" placeholder="örn. 0.0032 veya 45000" step="any" />
        </div>
        <button class="hc-btn" onclick="hcBuyuklukMertebesHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-buyukluk-mertebesi-hesaplama-result"></div>
    </div>
    <?php
}
