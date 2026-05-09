<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_firin_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-oven-power',
        HC_PLUGIN_URL . 'modules/firin-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-oven-power-css',
        HC_PLUGIN_URL . 'modules/firin-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-oven-power">
        <h3>Fırın Elektrik Tüketimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-op-usage">Kullanım Başına Tüketim (kWh)</label>
            <input type="number" id="hc-op-usage" placeholder="Örn: 0.9" step="0.1" value="1.0">
            <small>Standart bir fırın 1 saatlik kullanımda ortalama 0.8-1.5 kWh tüketir.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-op-freq">Haftalık Kullanım Sayısı</label>
            <input type="number" id="hc-op-freq" placeholder="Örn: 3" step="1" value="3">
        </div>

        <div class="hc-form-group">
            <label for="hc-op-price">kWh Birim Fiyatı (₺)</label>
            <input type="number" id="hc-op-price" value="3.11" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcFirinTuketimHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-op-result">
            <div class="hc-result-item">
                <span>Aylık Toplam Tüketim:</span>
                <span class="hc-result-value" id="hc-res-op-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Toplam Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-op-cost">-</span>
            </div>
        </div>
    </div>
    <?php
}
