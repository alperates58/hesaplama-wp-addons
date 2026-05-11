<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pazaryeri_komisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pazaryeri-komisyonu',
        HC_PLUGIN_URL . 'modules/pazaryeri-komisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pazaryeri-komisyonu-css',
        HC_PLUGIN_URL . 'modules/pazaryeri-komisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pazaryeri-komisyon">
        <h3>Pazaryeri Komisyonu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pk-sale">Satış Fiyatı (KDV Dahil ₺)</label>
            <input type="number" id="hc-pk-sale" placeholder="Örn: 500">
        </div>
        <div class="hc-form-group">
            <label for="hc-pk-cost">Ürün Maliyeti (₺)</label>
            <input type="number" id="hc-pk-cost" placeholder="Örn: 250">
        </div>
        <div class="hc-form-group">
            <label for="hc-pk-comm">Pazaryeri Komisyon Oranı (%)</label>
            <input type="number" id="hc-pk-comm" placeholder="Örn: 20" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-pk-ship">Kargo Ücreti (KDV Dahil ₺)</label>
            <input type="number" id="hc-pk-ship" placeholder="Örn: 45">
        </div>
        <button class="hc-btn" onclick="hcPazaryeriKomisyonHesapla()">Kâr Hesapla</button>
        <div class="hc-result" id="hc-pk-result">
            <div class="hc-result-item">
                <span>Pazaryeri Kesintisi (Komisyon):</span>
                <strong id="hc-pk-res-fee">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Net Kâr:</span>
                <strong class="hc-result-value" id="hc-pk-res-profit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kâr Oranı:</span>
                <strong id="hc-pk-res-margin">-</strong>
            </div>
        </div>
    </div>
    <?php
}
