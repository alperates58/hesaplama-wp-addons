<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isletme_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-isletme-karbon-ayak-izi-hesaplama',
        HC_PLUGIN_URL . 'modules/isletme-karbon-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-isletme-karbon-ayak-izi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/isletme-karbon-ayak-izi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-biz-carbon">
        <h3>İşletme Karbon Ayak İzi</h3>
        <div class="hc-form-group">
            <label for="hc-bc-elec">Aylık Elektrik Tüketimi (kWh)</label>
            <input type="number" id="hc-bc-elec" placeholder="Örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-bc-gas">Aylık Doğalgaz Tüketimi (m³)</label>
            <input type="number" id="hc-bc-gas" placeholder="Örn: 200">
        </div>
        <div class="hc-form-group">
            <label for="hc-bc-fuel">Aylık Araç Yakıtı (Litre)</label>
            <input type="number" id="hc-bc-fuel" placeholder="Örn: 100">
        </div>
        <button class="hc-btn" onclick="hcİşletmeKarbonAyakİziHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bc-result">
            <div class="hc-result-label">Yıllık Toplam CO₂e:</div>
            <div class="hc-result-value" id="hc-bc-val">-</div>
            <p id="hc-bc-info" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
