<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yagda_kizartma_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-frying-cost',
        HC_PLUGIN_URL . 'modules/yagda-kizartma-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-frying-cost-calc">
        <h3>Kızartma Yağı Maliyeti</h3>
        <div class="hc-form-group">
            <label for="hc-fyc-litres">Kullanılan Yağ (Litre):</label>
            <input type="number" id="hc-fyc-litres" placeholder="2">
        </div>
        <div class="hc-form-group">
            <label for="hc-fyc-price">Yağ Litre Fiyatı (₺):</label>
            <input type="number" id="hc-fyc-price" placeholder="60">
        </div>
        <div class="hc-form-group">
            <label for="hc-fyc-usage">Kullanım Sayısı (Tekrar):</label>
            <input type="number" id="hc-fyc-usage" value="3">
        </div>
        <button class="hc-btn" onclick="hcFryingCostHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-frying-cost-result">
            <strong>Kullanım Başı Maliyet:</strong>
            <div id="hc-fyc-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
