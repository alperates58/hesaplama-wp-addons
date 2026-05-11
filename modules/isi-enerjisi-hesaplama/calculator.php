<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isi_enerjisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-heat-energy',
        HC_PLUGIN_URL . 'modules/isi-enerjisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-heat-energy">
        <h3>Isı Enerjisi (Sensibıl Isı) Hesaplama</h3>
        <p><small>Q = m × c × ΔT</small></p>
        
        <div class="hc-form-group">
            <label>Kütle (m, kg)</label>
            <input type="number" id="hc-he-m" placeholder="kg" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Özgül Isı (c, kJ/kg·K)</label>
            <input type="number" id="hc-he-c" placeholder="kJ/kg·K" step="0.01" value="4.18">
            <small>Su: 4.18, Hava: 1.006, Çelik: 0.46</small>
        </div>
        
        <div class="hc-form-group">
            <label>Sıcaklık Değişimi (ΔT, °C veya K)</label>
            <input type="number" id="hc-he-dt" placeholder="ΔT" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcHeatEnergyHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-he-result">
            <span>Toplam Isı Enerjisi (Q):</span>
            <div class="hc-result-value" id="hc-he-res-val">0 kJ</div>
            <div id="hc-he-res-kcal" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 kcal</div>
        </div>
    </div>
    <?php
}
