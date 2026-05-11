<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_darcy_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-darcy',
        HC_PLUGIN_URL . 'modules/darcy-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-darcy">
        <h3>Darcy Yasası Hesaplama</h3>
        <p><small>Q = k · A · i</small></p>
        
        <div class="hc-form-group">
            <label>Hidrolik İletkenlik (k, m/s)</label>
            <input type="number" id="hc-dar-k" placeholder="Örn: 0.001" step="0.000001">
        </div>
        
        <div class="hc-form-group">
            <label>Kesit Alanı (A, m²)</label>
            <input type="number" id="hc-dar-a" placeholder="Örn: 10" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Hidrolik Eğim (i, Δh/L)</label>
            <input type="number" id="hc-dar-i" placeholder="Örn: 0.05" step="0.001">
        </div>
        
        <button class="hc-btn" onclick="hcDarcyHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-dar-result">
            <span>Hesaplanan Akış Debisi (Q):</span>
            <div class="hc-result-value" id="hc-dar-res-m3s">0 m³/sn</div>
            <div id="hc-dar-res-m3h" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 m³/saat</div>
        </div>
    </div>
    <?php
}
