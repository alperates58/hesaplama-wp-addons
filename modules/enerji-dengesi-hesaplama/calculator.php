<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enerji_dengesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-energy-balance',
        HC_PLUGIN_URL . 'modules/enerji-dengesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-energy-balance">
        <h3>Enerji Dengesi (1. Yasa) Hesaplama</h3>
        <p><small>ΔU = Q - W</small></p>
        
        <div class="hc-form-group">
            <label>Sisteme Giren Isı (Q, kJ)</label>
            <input type="number" id="hc-eb-q" placeholder="kJ" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Sistemin Yaptığı İş (W, kJ)</label>
            <input type="number" id="hc-eb-w" placeholder="kJ" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcEnergyBalanceHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-eb-result">
            <span>İç Enerji Değişimi (ΔU):</span>
            <div class="hc-result-value" id="hc-eb-res-val">0 kJ</div>
        </div>
    </div>
    <?php
}
