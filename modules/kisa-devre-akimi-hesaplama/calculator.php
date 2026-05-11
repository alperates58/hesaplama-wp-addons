<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisa_devre_akimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-short-circuit',
        HC_PLUGIN_URL . 'modules/kisa-devre-akimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-short-circuit">
        <h3>Kısa Devre Akımı (Isc) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Transformatör Gücü (S, kVA)</label>
            <input type="number" id="hc-sc-s" placeholder="kVA" step="10" value="1000">
        </div>
        
        <div class="hc-form-group">
            <label>Sekonder Gerilim (V, Volt)</label>
            <input type="number" id="hc-sc-v" placeholder="V" step="1" value="400">
        </div>
        
        <div class="hc-form-group">
            <label>Trafo Empedansı (Uk, %)</label>
            <input type="number" id="hc-sc-uk" placeholder="%" step="0.1" value="6">
        </div>
        
        <button class="hc-btn" onclick="hcShortCircuitHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-sc-result">
            <span>Kısa Devre Akımı (Isc):</span>
            <div class="hc-result-value" id="hc-sc-res-val">0 A</div>
            <div id="hc-sc-res-ka" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 kA</div>
        </div>
    </div>
    <?php
}
