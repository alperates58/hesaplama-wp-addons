<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_arac_ve_benzinli_arac_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-ice-compare',
        HC_PLUGIN_URL . 'modules/elektrikli-arac-ve-benzinli-arac-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-evc-box">
        <h3>Elektrikli vs Benzinli Araç Karşılaştırması</h3>
        <div class="hc-form-group">
            <label>Yıllık Yapılan Yol (km)</label>
            <input type="number" id="hc-evc-km" value="15000">
        </div>
        <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="hc-form-section">
                <h4>Benzinli Araç</h4>
                <div class="hc-form-group">
                    <label>Tüketim (L/100km)</label>
                    <input type="number" id="hc-evc-ice-cons" value="7.5">
                </div>
                <div class="hc-form-group">
                    <label>Benzin Fiyatı (TL/L)</label>
                    <input type="number" id="hc-evc-ice-price">
                </div>
            </div>
            <div class="hc-form-section">
                <h4>Elektrikli Araç</h4>
                <div class="hc-form-group">
                    <label>Tüketim (kWh/100km)</label>
                    <input type="number" id="hc-evc-ev-cons" value="18">
                </div>
                <div class="hc-form-group">
                    <label>Elektrik Fiyatı (TL/kWh)</label>
                    <input type="number" id="hc-evc-ev-price">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcEvcHesapla()">Karşılaştır</button>
        <div class="hc-result" id="hc-evc-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Yıllık Benzin Maliyeti:</strong><br><span id="hc-evc-ice-total">-</span></div>
                <div><strong>Yıllık Elektrik Maliyeti:</strong><br><span id="hc-evc-ev-total">-</span></div>
            </div>
            <div id="hc-evc-saving" style="margin-top: 15px; font-weight: bold; font-size: 18px; text-align: center; color: green;"></div>
        </div>
    </div>
    <?php
}
