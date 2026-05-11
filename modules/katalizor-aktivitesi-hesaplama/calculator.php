<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_katalizor_aktivitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cat-activity',
        HC_PLUGIN_URL . 'modules/katalizor-aktivitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cat-activity">
        <h3>Katalizör Aktivitesi (TOF) Hesaplama</h3>
        <p><small>TOF = Ürün Mol / (Katalizör Mol × Zaman)</small></p>
        
        <div class="hc-form-group">
            <label>Oluşan Ürün Miktarı (mol)</label>
            <input type="number" id="hc-ca-prod" placeholder="mol" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Katalizör Miktarı (mol)</label>
            <input type="number" id="hc-ca-cat" placeholder="mol" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Reaksiyon Süresi (saat)</label>
            <input type="number" id="hc-ca-time" placeholder="h" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcCatActivityHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ca-result">
            <span>Dönüşüm Frekansı (TOF):</span>
            <div class="hc-result-value" id="hc-ca-res-val">0 h⁻¹</div>
        </div>
    </div>
    <?php
}
