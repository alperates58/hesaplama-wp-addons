<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hacim_modulu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bulk-modulus',
        HC_PLUGIN_URL . 'modules/hacim-modulu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bulk-modulus">
        <h3>Hacim Modülü (Bulk Modulus) Hesaplama</h3>
        <p><small>K = -V₀ × (ΔP / ΔV)</small></p>
        
        <div class="hc-form-group">
            <label>Başlangıç Hacmi (V₀, m³)</label>
            <input type="number" id="hc-bm-v0" placeholder="m³" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Basınç Değişimi (ΔP, MPa)</label>
            <input type="number" id="hc-bm-dp" placeholder="MPa" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Hacim Değişimi (ΔV, m³)</label>
            <input type="number" id="hc-bm-dv" placeholder="Azalma miktarı" step="0.000001">
        </div>
        
        <button class="hc-btn" onclick="hcBulkModulusHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bm-result">
            <span>Hacim Modülü (K):</span>
            <div class="hc-result-value" id="hc-bm-res-val">0 GPa</div>
        </div>
    </div>
    <?php
}
