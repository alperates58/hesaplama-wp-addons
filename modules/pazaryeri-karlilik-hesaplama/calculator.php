<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pazaryeri_karlilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pazaryeri-karlilik-hesaplama',
        HC_PLUGIN_URL . 'modules/pazaryeri-karlilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pazaryeri-karlilik-css',
        HC_PLUGIN_URL . 'modules/pazaryeri-karlilik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pazaryeri-karlilik-hesaplama">
        <h3>Pazaryeri Karlılık Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kar-buy">Ürün Alış Fiyatı (KDV Dahil)</label>
            <input type="number" id="hc-kar-buy" placeholder="Örn: 200">
        </div>

        <div class="hc-form-group">
            <label for="hc-kar-sell">Ürün Satış Fiyatı (KDV Dahil)</label>
            <input type="number" id="hc-kar-sell" placeholder="Örn: 500">
        </div>

        <div class="hc-form-group">
            <label for="hc-kar-rate">Pazaryeri Komisyonu (%)</label>
            <input type="number" id="hc-kar-rate" placeholder="Örn: 15">
        </div>

        <div class="hc-form-group">
            <label for="hc-kar-shipping">Kargo + Paketleme Maliyeti (TL)</label>
            <input type="number" id="hc-kar-shipping" placeholder="Örn: 50">
        </div>

        <div class="hc-form-group">
            <label for="hc-kar-vat">KDV Oranı (%)</label>
            <select id="hc-kar-vat">
                <option value="20">%20</option>
                <option value="10">%10</option>
                <option value="1">%1</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcKarlilikHesapla()">Kâr Analizi Yap</button>
        
        <div class="hc-result" id="hc-karlilik-result">
            <div class="hc-result-item">
                <span>Pazaryeri Kesintisi:</span>
                <strong id="hc-kar-res-fee">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Ödenecek KDV (Net):</span>
                <strong id="hc-kar-res-vat">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kâr Marjı:</span>
                <strong id="hc-kar-res-margin">-</strong>
            </div>
            <div class="hc-result-value" id="hc-kar-res-profit">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Kâr (Tüm Giderler Sonrası)</p>
        </div>
    </div>
    <?php
}
