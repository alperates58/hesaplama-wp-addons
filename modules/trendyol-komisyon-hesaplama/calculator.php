<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_trendyol_komisyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-trendyol-komisyon-hesaplama',
        HC_PLUGIN_URL . 'modules/trendyol-komisyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-trendyol-komisyon-css',
        HC_PLUGIN_URL . 'modules/trendyol-komisyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-trendyol-komisyon-hesaplama">
        <h3>Trendyol Komisyon Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-tr-price">Satış Fiyatı (KDV Dahil)</label>
            <input type="number" id="hc-tr-price" placeholder="Örn: 500">
        </div>

        <div class="hc-form-group">
            <label for="hc-tr-rate">Komisyon Oranı (%)</label>
            <input type="number" id="hc-tr-rate" placeholder="Örn: 18">
        </div>

        <div class="hc-form-group">
            <label for="hc-tr-shipping">Kargo Ücreti (KDV Dahil)</label>
            <input type="number" id="hc-tr-shipping" placeholder="Örn: 45">
        </div>

        <div class="hc-form-group">
            <label for="hc-tr-ads">Reklam / Diğer Giderler (TL)</label>
            <input type="number" id="hc-tr-ads" value="0">
        </div>
        
        <button class="hc-btn" onclick="hcTrendyolHesapla()">Kâr Hesapla</button>
        
        <div class="hc-result" id="hc-trendyol-result">
            <div class="hc-result-item">
                <span>Komisyon Tutarı:</span>
                <strong id="hc-tr-res-kom">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Hizmet Bedeli:</span>
                <strong id="hc-tr-res-service">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Gider:</span>
                <strong id="hc-tr-res-total-exp">-</strong>
            </div>
            <div class="hc-result-value" id="hc-tr-res-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Hakediş (KDV Dahil)</p>
        </div>
    </div>
    <?php
}
