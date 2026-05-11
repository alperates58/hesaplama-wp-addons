<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kva_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kva-calc',
        HC_PLUGIN_URL . 'modules/kva-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kva-calc">
        <h3>kVA (Görünür Güç) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Akım (I, Amper)</label>
            <input type="number" id="hc-kv-i" placeholder="A" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Gerilim (V, Volt)</label>
            <input type="number" id="hc-kv-v" placeholder="V" step="1" value="220">
        </div>
        
        <div class="hc-form-group">
            <label>Faz Sayısı</label>
            <select id="hc-kv-phase">
                <option value="1">Tek Faz (Monofaze)</option>
                <option value="3">Üç Faz (Trifaze)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcKvaCalcHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kv-result">
            <span>Hesaplanan Görünür Güç:</span>
            <div class="hc-result-value" id="hc-kv-res-val">0 kVA</div>
        </div>
    </div>
    <?php
}
