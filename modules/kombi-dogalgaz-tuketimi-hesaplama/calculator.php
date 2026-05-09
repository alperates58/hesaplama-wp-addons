<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kombi_dogalgaz_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-boiler-cons',
        HC_PLUGIN_URL . 'modules/kombi-dogalgaz-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-boiler-cons-css',
        HC_PLUGIN_URL . 'modules/kombi-dogalgaz-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-boiler-cons">
        <h3>Kombi Doğalgaz Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-bc-power">Kombi Kapasitesi (kW)</label>
            <select id="hc-bc-power">
                <option value="20">20 kW (17.200 kcal/h)</option>
                <option value="24" selected>24 kW (20.640 kcal/h)</option>
                <option value="28">28 kW (24.080 kcal/h)</option>
                <option value="35">35 kW (30.100 kcal/h)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-bc-hours">Günlük Ortalama Çalışma (Saat)</label>
            <input type="number" id="hc-bc-hours" value="6" step="0.5">
            <small>Kombinin alevli yandığı toplam süre.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-bc-price">Gaz Birim Fiyatı (₺/m³)</label>
            <input type="number" id="hc-bc-price" value="9.50" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcKombiTuketimHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-bc-result">
            <div class="hc-result-item">
                <span>Günlük Tüketim:</span>
                <span class="hc-result-value" id="hc-res-bc-daily">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Toplam Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-bc-monthly">-</span>
            </div>
            <div class="hc-result-note">
                * Yoğuşmalı kombilerde 1 kW ısı için yaklaşık 0.1 m³/h gaz tüketimi baz alınmıştır.
            </div>
        </div>
    </div>
    <?php
}
