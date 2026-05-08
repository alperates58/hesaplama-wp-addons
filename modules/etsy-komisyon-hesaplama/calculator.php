<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_etsy_komisyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-etsy-komisyon-hesaplama',
        HC_PLUGIN_URL . 'modules/etsy-komisyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-etsy-komisyon-css',
        HC_PLUGIN_URL . 'modules/etsy-komisyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-etsy-komisyon-hesaplama">
        <h3>Etsy Komisyon Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ets-price">Satış Fiyatı (USD/EUR/TL)</label>
            <input type="number" id="hc-ets-price" placeholder="Örn: 100">
        </div>

        <div class="hc-form-group">
            <label for="hc-ets-currency">Para Birimi</label>
            <select id="hc-ets-currency">
                <option value="USD">USD ($)</option>
                <option value="EUR">EUR (€)</option>
                <option value="TRY">TRY (₺)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ets-rate">Dolar Kuru (USD/TRY)</label>
            <input type="number" id="hc-ets-rate" value="38.50">
            <small>Dolarla satış yapıyorsanız güncel kuru girin.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-ets-shipping">Kargo Maliyeti (TL)</label>
            <input type="number" id="hc-ets-shipping" placeholder="Örn: 450">
        </div>
        
        <button class="hc-btn" onclick="hcEtsyHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-etsy-result">
            <div class="hc-result-item">
                <span>İşlem Ücreti (6.5%):</span>
                <strong id="hc-ets-res-trans">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Ödeme İşleme (6.5% + 3TL):</span>
                <strong id="hc-ets-res-pay">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Listeleme ($0.20):</span>
                <strong id="hc-ets-res-list">-</strong>
            </div>
            <div class="hc-result-value" id="hc-ets-res-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Kazanç (TL)</p>
        </div>
    </div>
    <?php
}
