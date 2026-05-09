<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bulasik_makinesi_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dishwasher-power',
        HC_PLUGIN_URL . 'modules/bulasik-makinesi-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dishwasher-power-css',
        HC_PLUGIN_URL . 'modules/bulasik-makinesi-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dishwasher-power">
        <h3>Bulaşık Makinesi Elektrik Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-dw-cycle-kwh">Yıkama Başına Tüketim (kWh)</label>
            <input type="number" id="hc-dw-cycle-kwh" placeholder="Örn: 0.9" step="0.01" value="0.9">
            <small>Cihazın enerji etiketinde yazar. Ortalama 0.8-1.2 kWh arasıdır.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-dw-count">Haftalık Yıkama Sayısı</label>
            <input type="number" id="hc-dw-count" placeholder="Örn: 4" step="1" value="4">
        </div>

        <div class="hc-form-group">
            <label for="hc-dw-price">kWh Birim Fiyatı (₺)</label>
            <input type="number" id="hc-dw-price" value="3.11" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcBulasikMakinesiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-dw-result">
            <div class="hc-result-item">
                <span>Aylık Toplam Tüketim:</span>
                <span class="hc-result-value" id="hc-res-dw-monthly">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Toplam Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-dw-cost">-</span>
            </div>
        </div>
    </div>
    <?php
}
