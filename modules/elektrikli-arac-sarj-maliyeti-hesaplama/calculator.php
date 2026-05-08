<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_arac_sarj_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-charge-cost',
        HC_PLUGIN_URL . 'modules/elektrikli-arac-sarj-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ecc-box">
        <h3>Elektrikli Araç Şarj Maliyeti</h3>
        <div class="hc-form-group">
            <label>Batarya Kapasitesi (kWh)</label>
            <input type="number" id="hc-ecc-capacity" value="60">
        </div>
        <div class="hc-form-group">
            <label>Mevcut Şarj (%)</label>
            <input type="number" id="hc-ecc-start" value="10">
        </div>
        <div class="hc-form-group">
            <label>Hedef Şarj (%)</label>
            <input type="number" id="hc-ecc-end" value="80">
        </div>
        <div class="hc-form-group">
            <label>kWh Fiyatı (TL)</label>
            <input type="number" step="0.01" id="hc-ecc-price" placeholder="Örn: 2.60 (Ev) veya 7.50 (DC)">
        </div>
        <button class="hc-btn" onclick="hcEccHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ecc-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Yüklenecek Enerji:</strong><br><span id="hc-ecc-energy">-</span></div>
                <div><strong>Toplam Maliyet:</strong><br><span id="hc-ecc-total">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
