<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-karbon-ayak-izi-hesaplama',
        HC_PLUGIN_URL . 'modules/karbon-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-karbon-ayak-izi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/karbon-ayak-izi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-carbon-general">
        <h3>Genel Karbon Ayak İzi</h3>
        <div class="hc-form-group">
            <label for="hc-cg-elec">Aylık Elektrik Faturası (₺)</label>
            <input type="number" id="hc-cg-elec" placeholder="Örn: 500">
        </div>
        <div class="hc-form-group">
            <label for="hc-cg-gas">Aylık Doğalgaz Faturası (₺)</label>
            <input type="number" id="hc-cg-gas" placeholder="Örn: 400">
        </div>
        <div class="hc-form-group">
            <label for="hc-cg-car">Haftalık Araba Kullanımı (km)</label>
            <input type="number" id="hc-cg-car" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label for="hc-cg-diet">Beslenme Düzeni</label>
            <select id="hc-cg-diet">
                <option value="3.3">Yoğun Et Tüketimi</option>
                <option value="2.5" selected>Ortalama</option>
                <option value="1.7">Vejetaryen</option>
                <option value="1.5">Vegan</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKarbonAyakİziHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cg-result">
            <div class="hc-result-label">Yıllık Tahmini Karbon Ayak İzi:</div>
            <div class="hc-result-value" id="hc-cg-val">-</div>
            <p id="hc-cg-info" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
