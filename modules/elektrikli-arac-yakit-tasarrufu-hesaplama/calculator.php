<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_arac_yakit_tasarrufu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-fuel-save',
        HC_PLUGIN_URL . 'modules/elektrikli-arac-yakit-tasarrufu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-efs-box">
        <h3>EV Yakıt Tasarrufu Hesaplama</h3>
        <div class="hc-form-group">
            <label>Aylık Ortalama Mesafe (km)</label>
            <input type="number" id="hc-efs-km" value="1250">
        </div>
        <div class="hc-form-group">
            <label>Benzinli/Dizel Araç Tüketimi (L/100km)</label>
            <input type="number" step="0.1" id="hc-efs-ice-cons" value="7.0">
        </div>
        <div class="hc-form-group">
            <label>Elektrikli Araç Tüketimi (kWh/100km)</label>
            <input type="number" step="0.1" id="hc-efs-ev-cons" value="17.5">
        </div>
        <div class="hc-form-group">
            <label>Yakıt / Elektrik Birim Fiyatları</label>
            <div style="display: flex; gap: 5px;">
                <input type="number" id="hc-efs-ice-price" placeholder="Yakıt TL/L">
                <input type="number" id="hc-efs-ev-price" placeholder="Elek. TL/kWh">
            </div>
        </div>
        <button class="hc-btn" onclick="hcEfsHesapla()">Tasarrufu Hesapla</button>
        <div class="hc-result" id="hc-efs-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Aylık Tasarruf:</strong><br><span id="hc-efs-monthly">-</span></div>
                <div><strong>Yıllık Tasarruf:</strong><br><span id="hc-efs-annual">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
