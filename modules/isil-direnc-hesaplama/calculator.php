<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isil_direnc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-thermal-res',
        HC_PLUGIN_URL . 'modules/isil-direnc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-thermal-res">
        <h3>Isıl Direnç (Rth) Hesaplama</h3>
        <p><small>Rth = d / (k × A)</small></p>
        
        <div class="hc-form-group">
            <label>Malzeme Kalınlığı (d, metre)</label>
            <input type="number" id="hc-tr-d" placeholder="m" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Isıl İletkenlik (k, W/m·K)</label>
            <input type="number" id="hc-tr-k" placeholder="W/m·K" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Yüzey Alanı (A, m²)</label>
            <input type="number" id="hc-tr-a" placeholder="m²" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcThermalResHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-tr-result">
            <span>Isıl Direnç (Rth):</span>
            <div class="hc-result-value" id="hc-tr-res-val">0 K/W</div>
        </div>
    </div>
    <?php
}
