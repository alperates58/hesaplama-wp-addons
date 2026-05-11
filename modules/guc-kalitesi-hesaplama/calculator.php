<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_guc_kalitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pq-calc',
        HC_PLUGIN_URL . 'modules/guc-kalitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pq-calc">
        <h3>Gerilim Dengesizliği Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Faz 1 Gerilimi (V1, Volt)</label>
            <input type="number" id="hc-pq-v1" placeholder="V" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Faz 2 Gerilimi (V2, Volt)</label>
            <input type="number" id="hc-pq-v2" placeholder="V" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Faz 3 Gerilimi (V3, Volt)</label>
            <input type="number" id="hc-pq-v3" placeholder="V" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcPqHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-pq-result">
            <span>Gerilim Dengesizliği:</span>
            <div class="hc-result-value" id="hc-pq-res-val">%0</div>
            <div id="hc-pq-res-desc" style="margin-top:10px; text-align:center; font-size:0.9em; opacity:0.8;">-</div>
        </div>
    </div>
    <?php
}
