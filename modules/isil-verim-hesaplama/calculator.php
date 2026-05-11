<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isil_verim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-thermal-eff',
        HC_PLUGIN_URL . 'modules/isil-verim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-thermal-eff">
        <h3>Isıl Verim Hesaplama</h3>
        <p><small>η = 1 - (Qout / Qin)</small></p>
        
        <div class="hc-form-group">
            <label>Sisteme Giren Isı (Qin, kJ)</label>
            <input type="number" id="hc-tv-qin" placeholder="kJ" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Dışarı Atılan Isı (Qout, kJ)</label>
            <input type="number" id="hc-tv-qout" placeholder="kJ" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcThermalEffHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-tv-result">
            <span>Isıl Verim (η):</span>
            <div class="hc-result-value" id="hc-tv-res-val">%0</div>
        </div>
    </div>
    <?php
}
