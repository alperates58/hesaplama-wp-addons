<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isil_enerji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rad-heat',
        HC_PLUGIN_URL . 'modules/isil-enerji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-rad-heat">
        <h3>Işınım (Radyasyon) Isı Transferi</h3>
        <p><small>Q = ε × σ × A × (T₁⁴ - T₂⁴)</small></p>
        
        <div class="hc-form-group">
            <label>Yüzey Emisivitesi (ε, 0-1)</label>
            <input type="number" id="hc-rh-eps" placeholder="ε" step="0.01" value="0.9">
        </div>
        
        <div class="hc-form-group">
            <label>Yüzey Alanı (A, m²)</label>
            <input type="number" id="hc-rh-a" placeholder="m²" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Sıcak Yüzey (T1, °C)</label>
            <input type="number" id="hc-rh-t1" placeholder="°C" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Çevre Sıcaklığı (T2, °C)</label>
            <input type="number" id="hc-rh-t2" placeholder="°C" step="1" value="20">
        </div>
        
        <button class="hc-btn" onclick="hcRadHeatHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-rh-result">
            <span>Işınım Isı Akısı (Q):</span>
            <div class="hc-result-value" id="hc-rh-res-val">0 Watt</div>
        </div>
    </div>
    <?php
}
