<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isi_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-heat-cap',
        HC_PLUGIN_URL . 'modules/isi-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-heat-cap">
        <h3>Isı Kapasitesi (Termal Kapasite) Hesaplama</h3>
        <p><small>C = m × c</small></p>
        
        <div class="hc-form-group">
            <label>Kütle (m, kg)</label>
            <input type="number" id="hc-hc-m" placeholder="kg" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Özgül Isı (c, kJ/kg·K)</label>
            <input type="number" id="hc-hc-c" placeholder="kJ/kg·K" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcHeatCapHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hc-result">
            <span>Toplam Isı Kapasitesi (C):</span>
            <div class="hc-result-value" id="hc-hc-res-val">0 kJ/K</div>
        </div>
    </div>
    <?php
}
