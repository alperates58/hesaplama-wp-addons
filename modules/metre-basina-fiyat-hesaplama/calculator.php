<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_metre_basina_fiyat_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-price-meter',
        HC_PLUGIN_URL . 'modules/metre-basina-fiyat-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-price-meter-css',
        HC_PLUGIN_URL . 'modules/metre-basina-fiyat-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-price-meter">
        <h3>Metre Başına Fiyat</h3>
        <div class="hc-form-group">
            <label for="hc-m-total">Toplam Tutar (TL)</label>
            <input type="number" id="hc-m-total" placeholder="Örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-m-len">Toplam Uzunluk (Metre)</label>
            <input type="number" id="hc-m-len" placeholder="Örn: 5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcPriceMeterHesapla()">Birim Fiyatı Gör</button>
        <div class="hc-result" id="hc-price-meter-result">
            <div class="hc-result-item">
                <span>Metre Başına Fiyat:</span>
                <span class="hc-result-value" id="hc-res-m-price">0 TL</span>
            </div>
        </div>
    </div>
    <?php
}
