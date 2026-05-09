<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_market_birim_fiyat_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-unit-compare',
        HC_PLUGIN_URL . 'modules/market-birim-fiyat-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-unit-compare-css',
        HC_PLUGIN_URL . 'modules/market-birim-fiyat-karsilastirma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-unit-compare">
        <h3>Birim Fiyat Karşılaştırma</h3>
        <div class="hc-compare-grid">
            <div class="hc-compare-col">
                <h4>Ürün A</h4>
                <div class="hc-form-group"> <input type="number" id="hc-ca-price" placeholder="Fiyat (TL)"> </div>
                <div class="hc-form-group"> <input type="number" id="hc-ca-qty" placeholder="Miktar (gr/ml/adet)"> </div>
            </div>
            <div class="hc-compare-col">
                <h4>Ürün B</h4>
                <div class="hc-form-group"> <input type="number" id="hc-cb-price" placeholder="Fiyat (TL)"> </div>
                <div class="hc-form-group"> <input type="number" id="hc-cb-qty" placeholder="Miktar (gr/ml/adet)"> </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcUnitCompareHesapla()">Karşılaştır</button>
        <div class="hc-result" id="hc-unit-compare-result">
            <div id="hc-res-compare-winner" class="hc-winner-badge">...</div>
            <div class="hc-compare-details">
                <p>A Birim Fiyat: <b id="hc-res-ca-unit">-</b></p>
                <p>B Birim Fiyat: <b id="hc-res-cb-unit">-</b></p>
            </div>
        </div>
    </div>
    <?php
}
