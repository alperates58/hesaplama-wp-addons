<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kalorimetri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-calorimetry',
        HC_PLUGIN_URL . 'modules/kalorimetri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-calorimetry">
        <h3>Kalorimetri (Isı Değişimi) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Kütle (m, kg)</label>
            <input type="number" id="hc-km-m" placeholder="kg" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Özgül Isı (c, J/kg·°C)</label>
            <input type="number" id="hc-km-c" placeholder="Su için: 4186" step="1" value="4186">
        </div>
        
        <div class="hc-form-group">
            <label>Sıcaklık Değişimi (ΔT, °C)</label>
            <input type="number" id="hc-km-dt" placeholder="°C" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcCalorimetryHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-km-result">
            <span>Transfer Edilen Isı (Q):</span>
            <div class="hc-result-value" id="hc-km-res-val">0 Joule</div>
            <div id="hc-km-res-kj" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 kJ</div>
        </div>
    </div>
    <?php
}
