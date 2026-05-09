<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akilli_termostat_tasarrufu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-smart-thermostat',
        HC_PLUGIN_URL . 'modules/akilli-termostat-tasarrufu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-smart-thermostat-css',
        HC_PLUGIN_URL . 'modules/akilli-termostat-tasarrufu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-smart-thermostat">
        <h3>Akıllı Termostat Tasarrufu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-st-bill">Aylık Isınma/Soğutma Faturası (₺)</label>
            <input type="number" id="hc-st-bill" placeholder="Örn: 1.500" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-st-percent">Beklenen Tasarruf Oranı (%)</label>
            <input type="number" id="hc-st-percent" value="15" step="1">
            <small>Genellikle %10-%20 arası tasarruf sağlanır.</small>
        </div>

        <button class="hc-btn" onclick="hcAkilliTermostatHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-st-result">
            <div class="hc-result-item">
                <span>Aylık Tasarruf:</span>
                <span class="hc-result-value" id="hc-res-st-monthly">-</span>
            </div>
            <div class="hc-result-item">
                <span>Yıllık Tasarruf:</span>
                <span class="hc-result-value" id="hc-res-st-yearly">-</span>
            </div>
            <div class="hc-result-note">
                * Bu hesaplama, ortalama enerji verimliliği verilerine dayanmaktadır.
            </div>
        </div>
    </div>
    <?php
}
