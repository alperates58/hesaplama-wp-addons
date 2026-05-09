<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_klima_aylik_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ac-monthly',
        HC_PLUGIN_URL . 'modules/klima-aylik-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ac-monthly-css',
        HC_PLUGIN_URL . 'modules/klima-aylik-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ac-monthly">
        <h3>Klima Aylık Tüketim Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-am-btu">Klima Kapasitesi (BTU)</label>
            <select id="hc-am-btu">
                <option value="9000">9.000 BTU</option>
                <option value="12000" selected>12.000 BTU</option>
                <option value="18000">18.000 BTU</option>
                <option value="24000">24.000 BTU</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-am-seer">Enerji Sınıfı (SEER)</label>
            <select id="hc-am-seer">
                <option value="8.5">A+++ (SEER 8.5)</option>
                <option value="6.1">A++ (SEER 6.1)</option>
                <option value="5.1">A (SEER 5.1)</option>
                <option value="3.5">Eski Cihaz (SEER 3.5)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-am-hours">Günlük Ortalama Kullanım (Saat)</label>
            <input type="number" id="hc-am-hours" value="8" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-am-price">kWh Birim Fiyatı (₺)</label>
            <input type="number" id="hc-am-price" value="3.11" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcKlimaAylikHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-am-result">
            <div class="hc-result-item">
                <span>Aylık Toplam Tüketim:</span>
                <span class="hc-result-value" id="hc-res-am-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Tahmini Fatura:</span>
                <span class="hc-result-value highlight" id="hc-res-am-cost">-</span>
            </div>
            <div class="hc-result-note">
                * Inverter teknolojisi sayesinde kompresörün dur-kalk yapmadığı, stabil çalışma durumu baz alınmıştır.
            </div>
        </div>
    </div>
    <?php
}
