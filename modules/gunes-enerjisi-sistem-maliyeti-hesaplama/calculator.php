<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_enerjisi_sistem_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-cost',
        HC_PLUGIN_URL . 'modules/gunes-enerjisi-sistem-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solar-cost-css',
        HC_PLUGIN_URL . 'modules/gunes-enerjisi-sistem-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-cost">
        <h3>Güneş Enerjisi Sistem Maliyeti</h3>
        
        <div class="hc-form-group">
            <label for="hc-sc-power">Sistem Kapasitesi (kWp)</label>
            <input type="number" id="hc-sc-power" placeholder="Örn: 5" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-sc-type">Sistem Tipi</label>
            <select id="hc-sc-type">
                <option value="1200">On-Grid (Şebekeye Bağlı - 1.200 $/kW)</option>
                <option value="1800">Hybrid (Bataryalı - 1.800 $/kW)</option>
                <option value="2200">Off-Grid (Şebekeden Bağımsız - 2.200 $/kW)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sc-rate">Dolar Kuru (₺)</label>
            <input type="number" id="hc-sc-rate" value="45.50" step="0.1">
            <small>2026 tahmini kur.</small>
        </div>

        <button class="hc-btn" onclick="hcSolarMaliyetHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sc-result">
            <div class="hc-result-item">
                <span>Tahmini Toplam Maliyet ($):</span>
                <span class="hc-result-value" id="hc-res-sc-usd">-</span>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Toplam Maliyet (₺):</span>
                <span class="hc-result-value highlight" id="hc-res-sc-try">-</span>
            </div>
            <div class="hc-result-note">
                * Bu tutar; panel, inverter, konstrüksiyon, kablolama ve işçiliği kapsayan anahtar teslim tahmindir. Proje ve izin bedelleri dahil değildir.
            </div>
        </div>
    </div>
    <?php
}
