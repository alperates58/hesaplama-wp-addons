<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isil_yayinim_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-thermal-diff',
        HC_PLUGIN_URL . 'modules/isil-yayinim-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-thermal-diff">
        <h3>Isıl Yayınım Katsayısı (α) Hesaplama</h3>
        <p><small>α = k / (ρ × Cp)</small></p>
        
        <div class="hc-form-group">
            <label>Isıl İletkenlik (k, W/m·K)</label>
            <input type="number" id="hc-td-k" placeholder="W/m·K" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Yoğunluk (ρ, kg/m³)</label>
            <input type="number" id="hc-td-rho" placeholder="kg/m³" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Özgül Isı (Cp, J/kg·K)</label>
            <input type="number" id="hc-td-cp" placeholder="J/kg·K" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcThermalDiffHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-td-result">
            <span>Yayınım Katsayısı (α):</span>
            <div class="hc-result-value" id="hc-td-res-val">0 m²/s</div>
        </div>
    </div>
    <?php
}
