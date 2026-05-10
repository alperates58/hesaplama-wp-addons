<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vinil_cit_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vinyl-cost',
        HC_PLUGIN_URL . 'modules/vinil-cit-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vinyl-cost-css',
        HC_PLUGIN_URL . 'modules/vinil-cit-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vinyl-cost">
        <h3>Vinil Çit Maliyet Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-vc-panels">Panel Sayısı:</label>
            <input type="number" id="hc-vc-panels" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-vc-pprice">Panel Birim Fiyatı (₺):</label>
            <input type="number" id="hc-vc-pprice" placeholder="1500">
        </div>
        <div class="hc-form-group">
            <label for="hc-vc-posts">Direk Sayısı:</label>
            <input type="number" id="hc-vc-posts" placeholder="11">
        </div>
        <div class="hc-form-group">
            <label for="hc-vc-oprice">Direk Birim Fiyatı (₺):</label>
            <input type="number" id="hc-vc-oprice" placeholder="400">
        </div>
        <button class="hc-btn" onclick="hcVinylCostHesapla()">Maliyeti Hesapla</button>
        <div class="hc-result" id="hc-vinyl-cost-result">
            <strong>Toplam Tahmini Maliyet:</strong>
            <div id="hc-vc-res-val" class="hc-result-value">-</div>
            <span>Türk Lirası (₺)</span>
        </div>
    </div>
    <?php
}
