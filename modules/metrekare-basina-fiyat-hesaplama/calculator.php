<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_metrekare_basina_fiyat_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-price-m2',
        HC_PLUGIN_URL . 'modules/metrekare-basina-fiyat-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-price-m2-css',
        HC_PLUGIN_URL . 'modules/metrekare-basina-fiyat-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-price-m2">
        <h3>m² Başına Fiyat</h3>
        <div class="hc-form-group">
            <label for="hc-m2-total">Toplam Tutar (TL)</label>
            <input type="number" id="hc-m2-total" placeholder="Örn: 5000000">
        </div>
        <div class="hc-form-group">
            <label for="hc-m2-area">Toplam Alan (m²)</label>
            <input type="number" id="hc-m2-area" placeholder="Örn: 100">
        </div>
        <button class="hc-btn" onclick="hcPriceM2Hesapla()">Birim Fiyatı Gör</button>
        <div class="hc-result" id="hc-price-m2-result">
            <div class="hc-result-item">
                <span>m² Başına Fiyat:</span>
                <span class="hc-result-value" id="hc-res-m2-price">0 TL</span>
            </div>
        </div>
    </div>
    <?php
}
