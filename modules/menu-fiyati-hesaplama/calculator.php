<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_menu_fiyati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-menu-pricing',
        HC_PLUGIN_URL . 'modules/menu-fiyati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-menu-price-calc">
        <h3>Menü Satış Fiyatı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-price-cost">Tabak Maliyeti (₺):</label>
            <input type="number" id="hc-price-cost" placeholder="150">
        </div>
        <div class="hc-form-group">
            <label for="hc-price-margin">Hedef Gıda Maliyet Oranı (%):</label>
            <input type="number" id="hc-price-margin" value="30">
            <small>Restoran sektörü ortalaması %25 - %35</small>
        </div>
        <button class="hc-btn" onclick="hcMenuPriceHesapla()">Satış Fiyatını Hesapla</button>
        <div class="hc-result" id="hc-menu-price-result">
            <strong>Önerilen Satış Fiyatı:</strong>
            <div id="hc-price-val" class="hc-result-value">-</div>
            <p id="hc-price-info"></p>
        </div>
    </div>
    <?php
}
