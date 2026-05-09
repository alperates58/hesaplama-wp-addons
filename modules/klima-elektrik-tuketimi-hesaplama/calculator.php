<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_klima_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ac-power',
        HC_PLUGIN_URL . 'modules/klima-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ac-power-css',
        HC_PLUGIN_URL . 'modules/klima-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ac-power">
        <h3>Klima Elektrik Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-ke-watt">Anlık Tüketim (Watt)</label>
            <input type="number" id="hc-ke-watt" placeholder="Örn: 1000" step="1">
            <small>Kompresör tam güçteyken çekilen Watt değeri.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-ke-hours">Çalışma Süresi (Saat)</label>
            <input type="number" id="hc-ke-hours" value="1" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-ke-price">kWh Birim Fiyatı (₺)</label>
            <input type="number" id="hc-ke-price" value="3.11" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcKlimaTuketimHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ke-result">
            <div class="hc-result-item">
                <span>Toplam Tüketim:</span>
                <span class="hc-result-value" id="hc-res-ke-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Toplam Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-ke-cost">-</span>
            </div>
            <div class="hc-result-note">
                * Inverter klimalar hedef sıcaklığa ulaştığında tüketimi %70'e kadar düşürür. Hesaplama ortalama %60 yük bazlıdır.
            </div>
        </div>
    </div>
    <?php
}
