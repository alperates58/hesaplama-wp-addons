<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kva_dan_ampere_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kva-to-amp',
        HC_PLUGIN_URL . 'modules/kva-dan-ampere-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kva-to-amp">
        <h3>kVA'dan Ampere Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Görünür Güç (S, kVA)</label>
            <input type="number" id="hc-ka-kva" placeholder="kVA" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Gerilim (V, Volt)</label>
            <input type="number" id="hc-ka-v" placeholder="V" step="1" value="220">
        </div>
        
        <div class="hc-form-group">
            <label>Faz Sayısı</label>
            <select id="hc-ka-phase">
                <option value="1">Tek Faz (Monofaze)</option>
                <option value="3">Üç Faz (Trifaze)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcKvaToAmpHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ka-result">
            <span>Hesaplanan Akım (I):</span>
            <div class="hc-result-value" id="hc-ka-res-val">0 Amper</div>
        </div>
    </div>
    <?php
}
