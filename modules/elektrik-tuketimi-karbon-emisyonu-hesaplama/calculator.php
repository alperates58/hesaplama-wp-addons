<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrik_tuketimi_karbon_emisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-el-emisyon',
        HC_PLUGIN_URL . 'modules/elektrik-tuketimi-karbon-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-el-emisyon-css',
        HC_PLUGIN_URL . 'modules/elektrik-tuketimi-karbon-emisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-el-emisyon">
        <h3>Elektrik Karbon Emisyonu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-el-kwh">Elektrik Tüketimi (kWh)</label>
            <input type="number" id="hc-el-kwh" placeholder="Örn: 250" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-el-period">Dönem</label>
            <select id="hc-el-period">
                <option value="1">Aylık</option>
                <option value="12">Yıllık</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcElEmisyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-el-emisyon-result">
            <div class="hc-result-item">
                <span>Toplam CO2 Salınımı:</span>
                <span class="hc-result-value" id="hc-res-el-co2">0 kg</span>
            </div>
            <p id="hc-res-el-info">Türkiye 2026 yılı ortalama şebeke emisyon faktörü (0.49 kg/kWh) kullanılmıştır.</p>
        </div>
    </div>
    <?php
}
