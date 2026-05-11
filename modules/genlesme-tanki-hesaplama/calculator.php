<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_genlesme_tanki_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-expansion-tank',
        HC_PLUGIN_URL . 'modules/genlesme-tanki-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-expansion-tank">
        <h3>Genleşme Tankı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Toplam Sistem Su Hacmi (Litre)</label>
            <input type="number" id="hc-et-sys-v" placeholder="Örn: 500" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Maksimum Çalışma Sıcaklığı (°C)</label>
            <input type="number" id="hc-et-temp" placeholder="Örn: 90" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Ön Gaz Basıncı (P0, bar)</label>
            <input type="number" id="hc-et-p0" placeholder="Örn: 1.5" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Emniyet Ventili Basıncı (Pe, bar)</label>
            <input type="number" id="hc-et-pe" placeholder="Örn: 3" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcExpansionTankHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-et-result">
            <span>Önerilen Tank Hacmi (V):</span>
            <div class="hc-result-value" id="hc-et-res-val">0 Litre</div>
            <small>Formül: V = (e × Vs) / (1 - (P0+1)/(Pe+1))</small>
        </div>
    </div>
    <?php
}
