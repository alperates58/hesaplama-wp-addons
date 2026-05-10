<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_stok_fire_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stock-waste',
        HC_PLUGIN_URL . 'modules/stok-fire-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-stock-waste">
        <h3>Stok Fire Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-sw-loss">Fire / Kayıp Miktarı:</label>
            <input type="number" id="hc-sw-loss" placeholder="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-sw-total">Toplam Stok Miktarı:</label>
            <input type="number" id="hc-sw-total" placeholder="1000">
        </div>
        <button class="hc-btn" onclick="hcStockWasteHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-stok-fire-result">
            <strong>Fire Oranı:</strong>
            <div id="hc-sw-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
