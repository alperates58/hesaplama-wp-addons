<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yemek_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dish-cost-js',
        HC_PLUGIN_URL . 'modules/yemek-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dish-cost-css',
        HC_PLUGIN_URL . 'modules/yemek-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dish-cost">
        <h3>Porsiyon Maliyet Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-dc-total">Toplam Malzeme Maliyeti (₺)</label>
            <input type="number" id="hc-dc-total" placeholder="Örn: 500" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-dc-portions">Toplam Porsiyon Sayısı</label>
            <input type="number" id="hc-dc-portions" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-dc-overhead">Genel Gider Payı (%)</label>
            <input type="number" id="hc-dc-overhead" value="10" min="0">
            <small>Kira, işçilik, enerji vb.</small>
        </div>

        <button class="hc-btn" onclick="hcYemekMaliyetiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-dish-cost-result">
            <div class="hc-result-item">
                <span>Porsiyon Başı Net Maliyet:</span>
                <strong class="hc-result-value" id="hc-dc-res-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Önerilen Satış Fiyatı (%30 Kar):</span>
                <strong id="hc-dc-sell-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
