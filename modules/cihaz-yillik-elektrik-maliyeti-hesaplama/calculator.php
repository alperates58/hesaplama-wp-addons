<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cihaz_yillik_elektrik_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-device-yearly',
        HC_PLUGIN_URL . 'modules/cihaz-yillik-elektrik-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-device-yearly-css',
        HC_PLUGIN_URL . 'modules/cihaz-yillik-elektrik-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-device-yearly">
        <h3>Cihaz Yıllık Elektrik Maliyeti</h3>
        
        <div class="hc-form-group">
            <label for="hc-dy-watt">Cihaz Gücü (Watt)</label>
            <input type="number" id="hc-dy-watt" placeholder="Örn: 2000" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-dy-hours">Günlük Ortalama Kullanım (Saat)</label>
            <input type="number" id="hc-dy-hours" placeholder="Örn: 1" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-dy-price">kWh Birim Fiyatı (₺)</label>
            <input type="number" id="hc-dy-price" value="3.11" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcCihazYillikHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-dy-result">
            <div class="hc-result-item">
                <span>Yıllık Toplam Tüketim:</span>
                <span class="hc-result-value" id="hc-res-dy-yearly">-</span>
            </div>
            <div class="hc-result-item">
                <span>Yıllık Toplam Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-dy-cost">-</span>
            </div>
        </div>
    </div>
    <?php
}
