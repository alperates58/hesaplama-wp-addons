<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_buzdolabi_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-buzdolabi-el',
        HC_PLUGIN_URL . 'modules/buzdolabi-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-buzdolabi-el-css',
        HC_PLUGIN_URL . 'modules/buzdolabi-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-buzdolabi-el">
        <h3>Buzdolabı Elektrik Tüketimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fridge-class">Enerji Sınıfı (Yeni Etiket)</label>
            <select id="hc-fridge-class">
                <option value="A">A Sınıfı (En Verimli)</option>
                <option value="B">B Sınıfı</option>
                <option value="C">C Sınıfı</option>
                <option value="D">D Sınıfı</option>
                <option value="E">E Sınıfı</option>
                <option value="F">F Sınıfı</option>
                <option value="old">Eski Tip (10+ Yıllık)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-fridge-price">Elektrik Birim Fiyatı (TL/kWh)</label>
            <input type="number" id="hc-fridge-price" placeholder="Örn: 2.50" min="0.1" step="0.01" value="2.50">
        </div>
        <button class="hc-btn" onclick="hcBuzdolabiElHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-buzdolabi-el-result">
            <div class="hc-result-item">
                <span>Yıllık Tüketim:</span>
                <span class="hc-result-value" id="hc-res-fridge-kwh">0 kWh</span>
            </div>
            <div class="hc-result-item">
                <span>Yıllık Maliyet:</span>
                <span id="hc-res-fridge-cost">0 TL</span>
            </div>
            <div class="hc-result-item">
                <span>Yıllık Karbon Ayak İzi:</span>
                <span id="hc-res-fridge-co2">0 kg CO2</span>
            </div>
        </div>
    </div>
    <?php
}
