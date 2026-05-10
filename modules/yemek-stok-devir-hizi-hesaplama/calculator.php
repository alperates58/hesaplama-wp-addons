<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yemek_stok_devir_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stock-turnover',
        HC_PLUGIN_URL . 'modules/yemek-stok-devir-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-stock-turn-calc">
        <h3>Stok Devir Hızı</h3>
        <div class="hc-form-group">
            <label for="hc-st-cogs">Satılan Malın Maliyeti (₺):</label>
            <input type="number" id="hc-st-cogs" placeholder="100000">
        </div>
        <div class="hc-form-group">
            <label for="hc-st-avg">Ortalama Stok Değeri (₺):</label>
            <input type="number" id="hc-st-avg" placeholder="10000">
        </div>
        <button class="hc-btn" onclick="hcStockTurnoverHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-stock-turnover-result">
            <strong>Stok Devir Hızı:</strong>
            <div id="hc-st-val" class="hc-result-value">-</div>
            <p id="hc-st-info"></p>
        </div>
    </div>
    <?php
}
