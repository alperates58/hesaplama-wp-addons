<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_litre_basina_fiyat_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-price-liter',
        HC_PLUGIN_URL . 'modules/litre-basina-fiyat-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-price-liter-css',
        HC_PLUGIN_URL . 'modules/litre-basina-fiyat-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-price-liter">
        <h3>Litre Başına Fiyat</h3>
        <div class="hc-form-group">
            <label for="hc-lp-total">Toplam Tutar (TL)</label>
            <input type="number" id="hc-lp-total" placeholder="Örn: 250">
        </div>
        <div class="hc-form-group">
            <label for="hc-lp-vol">Hacim (Litre)</label>
            <input type="number" id="hc-lp-vol" placeholder="Örn: 5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcPriceLiterHesapla()">Birim Fiyatı Gör</button>
        <div class="hc-result" id="hc-price-liter-result">
            <div class="hc-result-item">
                <span>Litre Başına Fiyat:</span>
                <span class="hc-result-value" id="hc-res-lp-price">0 TL</span>
            </div>
        </div>
    </div>
    <?php
}
