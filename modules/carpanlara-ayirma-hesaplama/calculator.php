<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_carpanlara_ayirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-carpanlara-ayirma-hesaplama',
        HC_PLUGIN_URL . 'modules/carpanlara-ayirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-carpanlara-ayirma-hesaplama-css',
        HC_PLUGIN_URL . 'modules/carpanlara-ayirma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-carpanlara-ayirma-hesaplama">
        <h3>Çarpanlara Ayırma Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-carpanlara-ayirma-sayi">Sayı (tam sayı)</label>
            <input type="number" id="hc-carpanlara-ayirma-sayi" placeholder="Tam sayı" min="1" class="hc-input" />
        </div>
        <button class="hc-btn" onclick="hcCarpanlaraAyirmaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-carpanlara-ayirma-hesaplama-result">
            <span class="hc-result-value" id="hc-carpanlara-ayirma-hesaplama-value"></span>
        </div>
    </div>
    <?php
}
?>
