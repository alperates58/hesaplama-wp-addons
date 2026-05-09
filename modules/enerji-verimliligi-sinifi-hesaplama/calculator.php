<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enerji_verimliligi_sinifi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-eei-class',
        HC_PLUGIN_URL . 'modules/enerji-verimliligi-sinifi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-eei-class-css',
        HC_PLUGIN_URL . 'modules/enerji-verimliligi-sinifi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-eei-class">
        <h3>Enerji Verimliliği Sınıfı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ee-actual">Cihazın Yıllık Tüketimi (kWh/yıl)</label>
            <input type="number" id="hc-ee-actual" placeholder="Örn: 200" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ee-ref">Standart Referans Tüketim (kWh/yıl)</label>
            <input type="number" id="hc-ee-ref" placeholder="Örn: 500" step="1">
            <small>Cihaz tipine göre benzer modellerin ortalaması.</small>
        </div>

        <button class="hc-btn" onclick="hcEnerjiSinifiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ee-result">
            <div class="hc-result-item">
                <span>Enerji Verimlilik İndeksi (EEI):</span>
                <span class="hc-result-value" id="hc-res-ee-index">-</span>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Enerji Sınıfı:</span>
                <span class="hc-result-value highlight" id="hc-res-ee-class">-</span>
            </div>
        </div>
    </div>
    <?php
}
