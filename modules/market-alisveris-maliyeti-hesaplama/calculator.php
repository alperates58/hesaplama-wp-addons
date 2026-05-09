<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_market_alisveris_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-shopping-cost',
        HC_PLUGIN_URL . 'modules/market-alisveris-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-shopping-cost-css',
        HC_PLUGIN_URL . 'modules/market-alisveris-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-shopping-cost">
        <h3>Market Alışveriş Listesi</h3>
        <div id="hc-sc-items">
            <div class="hc-sc-row">
                <input type="text" class="hc-sc-name" placeholder="Ürün Adı">
                <input type="number" class="hc-sc-price" placeholder="Fiyat (TL)" step="0.01">
            </div>
        </div>
        <button class="hc-btn-alt" onclick="hcAddShoppingRow()">+ Ürün Ekle</button>
        <button class="hc-btn" onclick="hcShoppingCostHesapla()">Toplamı Hesapla</button>
        <div class="hc-result" id="hc-shopping-cost-result">
            <div class="hc-result-item">
                <span>Toplam Tutar:</span>
                <span class="hc-result-value" id="hc-res-sc-grand-total">0 TL</span>
            </div>
        </div>
    </div>
    <?php
}
