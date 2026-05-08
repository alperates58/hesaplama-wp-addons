<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogalgaz_cng_arac_tasarrufu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cng-saving',
        HC_PLUGIN_URL . 'modules/dogalgaz-cng-arac-tasarrufu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cng-box">
        <h3>CNG Tasarruf Hesaplama</h3>
        <div class="hc-form-group">
            <label>Aylık Ortalama KM</label>
            <input type="number" id="hc-cng-km" value="1500">
        </div>
        <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
            <div class="hc-form-group"><label>Benzin Fiyatı (TL/L)</label><input type="number" step="0.01" id="hc-cng-p-price"></div>
            <div class="hc-form-group"><label>CNG Fiyatı (TL/kg)</label><input type="number" step="0.01" id="hc-cng-c-price"></div>
        </div>
        <div class="hc-form-group">
            <label>Benzin Tüketimi (L/100km)</label>
            <input type="number" step="0.1" id="hc-cng-cons" value="8.0">
        </div>
        <button class="hc-btn" onclick="hcCngHesapla()">Tasarrufu Hesapla</button>
        <div class="hc-result" id="hc-cng-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Aylık Tasarruf:</strong><br><span id="hc-cng-monthly">-</span></div>
                <div><strong>Yıllık Tasarruf:</strong><br><span id="hc-cng-yearly">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
