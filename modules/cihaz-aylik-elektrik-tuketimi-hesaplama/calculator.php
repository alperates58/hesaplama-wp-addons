<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cihaz_aylik_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-device-monthly',
        HC_PLUGIN_URL . 'modules/cihaz-aylik-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-device-monthly-css',
        HC_PLUGIN_URL . 'modules/cihaz-aylik-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-device-monthly">
        <h3>Cihaz Aylık Elektrik Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-dm-watt">Cihaz Gücü (Watt)</label>
            <input type="number" id="hc-dm-watt" placeholder="Örn: 1000" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-dm-hours">Günlük Kullanım (Saat)</label>
            <input type="number" id="hc-dm-hours" placeholder="Örn: 2" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-dm-price">kWh Birim Fiyatı (₺)</label>
            <input type="number" id="hc-dm-price" value="3.11" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcCihazAylikHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-dm-result">
            <div class="hc-result-item">
                <span>Aylık Tüketim:</span>
                <span class="hc-result-value" id="hc-res-dm-monthly">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-dm-cost">-</span>
            </div>
        </div>
    </div>
    <?php
}
