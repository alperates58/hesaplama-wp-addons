<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_camasir_makinesi_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-washing-machine',
        HC_PLUGIN_URL . 'modules/camasir-makinesi-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-washing-machine-css',
        HC_PLUGIN_URL . 'modules/camasir-makinesi-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-washing-machine">
        <h3>Çamaşır Makinesi Elektrik Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-wm-cycle">Yıkama Başına Tüketim (kWh)</label>
            <input type="number" id="hc-wm-cycle" placeholder="Örn: 0.8" step="0.01" value="0.8">
            <small>60°C pamuklu programı için ortalama 0.7-1.0 kWh arasıdır.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-wm-freq">Haftalık Yıkama Sayısı</label>
            <input type="number" id="hc-wm-freq" placeholder="Örn: 5" step="1" value="5">
        </div>

        <div class="hc-form-group">
            <label for="hc-wm-price">kWh Birim Fiyatı (₺)</label>
            <input type="number" id="hc-wm-price" value="3.11" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcCamasirMakinesiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-wm-result">
            <div class="hc-result-item">
                <span>Aylık Tüketim:</span>
                <span class="hc-result-value" id="hc-res-wm-usage">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Tahmini Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-wm-cost">-</span>
            </div>
        </div>
    </div>
    <?php
}
