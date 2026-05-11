<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isil_iletkenlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-thermal-cond',
        HC_PLUGIN_URL . 'modules/isil-iletkenlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-thermal-cond">
        <h3>Isıl İletkenlik (k) Hesaplama</h3>
        <p><small>k = (Q × d) / (A × ΔT)</small></p>
        
        <div class="hc-form-group">
            <label>Aktarılan Isı (Q, Watt)</label>
            <input type="number" id="hc-tk-q" placeholder="W" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Malzeme Kalınlığı (d, metre)</label>
            <input type="number" id="hc-tk-d" placeholder="m" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Yüzey Alanı (A, m²)</label>
            <input type="number" id="hc-tk-a" placeholder="m²" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Sıcaklık Farkı (ΔT, K)</label>
            <input type="number" id="hc-tk-dt" placeholder="K" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcThermalCondHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-tk-result">
            <span>Isıl İletkenlik (k):</span>
            <div class="hc-result-value" id="hc-tk-res-val">0 W/m·K</div>
        </div>
    </div>
    <?php
}
