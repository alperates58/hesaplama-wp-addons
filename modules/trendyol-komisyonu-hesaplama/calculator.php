<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_trendyol_komisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-trendyol-komisyonu',
        HC_PLUGIN_URL . 'modules/trendyol-komisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-trendyol-komisyonu-css',
        HC_PLUGIN_URL . 'modules/trendyol-komisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-trendyol-komisyon">
        <h3>Trendyol Komisyonu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tk-sale">Satış Fiyatı (₺)</label>
            <input type="number" id="hc-tk-sale" placeholder="Örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-tk-comm">Komisyon Oranı (%)</label>
            <input type="number" id="hc-tk-comm" placeholder="Örn: 18">
        </div>
        <div class="hc-form-group">
            <label for="hc-tk-service">Hizmet Bedeli (₺ - Sabit)</label>
            <input type="number" id="hc-tk-service" value="4.99" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-tk-ship">Kargo Ücreti (₺)</label>
            <input type="number" id="hc-tk-ship" placeholder="Örn: 50">
        </div>
        <button class="hc-btn" onclick="hcTrendyolKomisyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tk-result">
            <div class="hc-result-item">
                <span>Trendyol Komisyonu:</span>
                <strong id="hc-tk-res-comm">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Kesinti:</span>
                <strong id="hc-tk-res-total-fee">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Elinize Geçecek Net:</span>
                <strong class="hc-result-value" id="hc-tk-res-net">-</strong>
            </div>
        </div>
    </div>
    <?php
}
