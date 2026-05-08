<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_amazon_komisyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-amazon-komisyon-hesaplama',
        HC_PLUGIN_URL . 'modules/amazon-komisyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-amazon-komisyon-css',
        HC_PLUGIN_URL . 'modules/amazon-komisyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-amazon-komisyon-hesaplama">
        <h3>Amazon Komisyon Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-amz-price">Satış Fiyatı (TL)</label>
            <input type="number" id="hc-amz-price" placeholder="Örn: 1000">
        </div>

        <div class="hc-form-group">
            <label for="hc-amz-rate">Komisyon Oranı (%)</label>
            <input type="number" id="hc-amz-rate" placeholder="Örn: 10">
        </div>

        <div class="hc-form-group">
            <label for="hc-amz-fba">FBA / Kargo Ücreti (TL)</label>
            <input type="number" id="hc-amz-fba" placeholder="Örn: 25">
        </div>
        
        <button class="hc-btn" onclick="hcAmazonHesapla()">Kâr Hesapla</button>
        
        <div class="hc-result" id="hc-amazon-result">
            <div class="hc-result-item">
                <span>Yönlendirme Ücreti (Komisyon):</span>
                <strong id="hc-amz-res-kom">-</strong>
            </div>
            <div class="hc-result-value" id="hc-amz-res-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Hakediş</p>
        </div>
    </div>
    <?php
}
