<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_cihaz_enerji_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-device-consumption',
        HC_PLUGIN_URL . 'modules/elektrikli-cihaz-enerji-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-device-consumption-css',
        HC_PLUGIN_URL . 'modules/elektrikli-cihaz-enerji-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-device-consumption">
        <h3>Elektrikli Cihaz Enerji Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-dc-watt">Cihaz Gücü (Watt)</label>
            <input type="number" id="hc-dc-watt" placeholder="Örn: 1500" step="1">
            <small>Cihazın arkasındaki etikette 'W' harfi ile belirtilen değer.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-dc-hours">Günlük Kullanım (Saat)</label>
            <input type="number" id="hc-dc-hours" placeholder="Örn: 3" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-dc-days">Aylık Kullanım Günü</label>
            <input type="number" id="hc-dc-days" value="30" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-dc-price">kWh Birim Fiyatı (₺)</label>
            <input type="number" id="hc-dc-price" value="3.11" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcCihazTuketimiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-dc-result">
            <div class="hc-result-item">
                <span>Dönemlik Toplam Tüketim:</span>
                <span class="hc-result-value" id="hc-res-dc-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Dönemlik Toplam Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-dc-cost">-</span>
            </div>
        </div>
    </div>
    <?php
}
