<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kilogram_basina_fiyat_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kilogram-basina-fiyat-hesaplama',
        HC_PLUGIN_URL . 'modules/kilogram-basina-fiyat-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kilogram-basina-fiyat-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kilogram-basina-fiyat-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-unit-price">
        <h3>Kilogram Başına Fiyat (Birim Fiyat)</h3>
        <div class="hc-form-group">
            <label for="hc-unit-cost">Ürün Fiyatı (₺)</label>
            <input type="number" id="hc-unit-cost" placeholder="Örn: 24.50" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-unit-weight">Miktar</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-unit-val" placeholder="Örn: 400" style="flex: 2;">
                <select id="hc-unit-type" style="flex: 1;">
                    <option value="gr">Gram (gr)</option>
                    <option value="kg">Kilo (kg)</option>
                    <option value="ml">Mililitre (ml)</option>
                    <option value="lt">Litre (lt)</option>
                </select>
            </div>
        </div>
        <button class="hc-btn" onclick="hcKilogramBaşınaFiyatHesapla()">Birim Fiyatı Hesapla</button>
        <div class="hc-result" id="hc-unit-result">
            <div class="hc-result-label">1 KG / 1 LT Fiyatı:</div>
            <div class="hc-result-value" id="hc-unit-res">-</div>
        </div>
    </div>
    <?php
}
