<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_buzdolabi_aylik_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fridge-power',
        HC_PLUGIN_URL . 'modules/buzdolabi-aylik-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fridge-power-css',
        HC_PLUGIN_URL . 'modules/buzdolabi-aylik-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fridge-power">
        <h3>Buzdolabı Aylık Elektrik Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-fr-annual-kwh">Yıllık Tüketim (kWh)</label>
            <input type="number" id="hc-fr-annual-kwh" placeholder="Örn: 300" step="1" value="250">
            <small>Cihazın enerji etiketindeki yıllık (kWh/annum) değeridir.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-fr-price">kWh Birim Fiyatı (₺)</label>
            <input type="number" id="hc-fr-price" value="3.11" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcBuzdolabiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-fr-result">
            <div class="hc-result-item">
                <span>Aylık Ortalama Tüketim:</span>
                <span class="hc-result-value" id="hc-res-fr-monthly">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Ortalama Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-fr-cost">-</span>
            </div>
        </div>
    </div>
    <?php
}
