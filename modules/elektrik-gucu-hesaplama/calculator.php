<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrik_gucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-elec-power',
        HC_PLUGIN_URL . 'modules/elektrik-gucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-elec-power">
        <h3>Elektrik Gücü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Akım (I, Amper)</label>
            <input type="number" id="hc-ep-i" placeholder="A" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Gerilim (V, Volt)</label>
            <input type="number" id="hc-ep-v" placeholder="V" step="1" value="220">
        </div>
        
        <div class="hc-form-group">
            <label>Faz / Akım Türü</label>
            <select id="hc-ep-phase" onchange="hcEpTogglePf()">
                <option value="dc">DC (Doğru Akım)</option>
                <option value="1ac" selected>AC - Tek Faz (Monofaze)</option>
                <option value="3ac">AC - Üç Faz (Trifaze)</option>
            </select>
        </div>
        
        <div class="hc-form-group" id="hc-ep-pf-group">
            <label>Güç Faktörü (cos φ)</label>
            <input type="number" id="hc-ep-pf" placeholder="0.8 - 1.0" step="0.01" value="0.95">
        </div>
        
        <button class="hc-btn" onclick="hcElecPowerHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ep-result">
            <span>Hesaplanan Güç (P):</span>
            <div class="hc-result-value" id="hc-ep-res-val">0 W</div>
            <div id="hc-ep-res-kw" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 kW</div>
        </div>
    </div>
    <?php
}
