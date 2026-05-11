<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isil_gerilme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-thermal-stress',
        HC_PLUGIN_URL . 'modules/isil-gerilme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-thermal-stress">
        <h3>Isıl Gerilme Hesaplama</h3>
        <p><small>σ = E × α × ΔT</small></p>
        
        <div class="hc-form-group">
            <label>Young Modülü (E, GPa)</label>
            <input type="number" id="hc-ts-e" placeholder="GPa" step="1" value="210">
        </div>
        
        <div class="hc-form-group">
            <label>Genleşme Katsayısı (α, 1/°C)</label>
            <input type="number" id="hc-ts-alpha" placeholder="α" step="0.000001" value="0.000012">
        </div>
        
        <div class="hc-form-group">
            <label>Sıcaklık Değişimi (ΔT, °C)</label>
            <input type="number" id="hc-ts-dt" placeholder="°C" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcThermalStressHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ts-result">
            <span>Oluşan Isıl Gerilme (σ):</span>
            <div class="hc-result-value" id="hc-ts-res-val">0 MPa</div>
        </div>
    </div>
    <?php
}
