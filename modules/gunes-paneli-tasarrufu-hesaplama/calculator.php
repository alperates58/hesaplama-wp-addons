<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_paneli_tasarrufu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-savings',
        HC_PLUGIN_URL . 'modules/gunes-paneli-tasarrufu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solar-savings-css',
        HC_PLUGIN_URL . 'modules/gunes-paneli-tasarrufu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-savings">
        <h3>Güneş Paneli Tasarrufu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ss-power">Sistem Gücü (kWp)</label>
            <input type="number" id="hc-ss-power" placeholder="Örn: 5" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ss-sun">Günlük Güneşlenme Süresi (Saat)</label>
            <input type="number" id="hc-ss-sun" value="5" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-ss-price">kWh Birim Fiyatı (₺)</label>
            <input type="number" id="hc-ss-price" value="3.11" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcSolarTasarrufHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ss-result">
            <div class="hc-result-item">
                <span>Günlük Tasarruf:</span>
                <span class="hc-result-value" id="hc-res-ss-daily">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Tasarruf:</span>
                <span class="hc-result-value" id="hc-res-ss-monthly">-</span>
            </div>
            <div class="hc-result-item">
                <span>Yıllık Tasarruf:</span>
                <span class="hc-result-value highlight" id="hc-res-ss-yearly">-</span>
            </div>
        </div>
    </div>
    <?php
}
