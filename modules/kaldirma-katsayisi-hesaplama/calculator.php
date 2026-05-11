<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kaldirma_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lift-coeff',
        HC_PLUGIN_URL . 'modules/kaldirma-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lift-coeff">
        <h3>Kaldırma Katsayısı (Cl) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Kaldırma Kuvveti (L, Newton)</label>
            <input type="number" id="hc-cl-l" placeholder="N" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Hava Yoğunluğu (ρ, kg/m³)</label>
            <input type="number" id="hc-cl-rho" placeholder="Deniz seviyesi: 1.225" step="0.001" value="1.225">
        </div>
        
        <div class="hc-form-group">
            <label>Hız (V, m/s)</label>
            <input type="number" id="hc-cl-v" placeholder="m/s" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Kanat Alanı (S, m²)</label>
            <input type="number" id="hc-cl-s" placeholder="m²" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcLiftCoeffHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cl-result">
            <span>Kaldırma Katsayısı (Cl):</span>
            <div class="hc-result-value" id="hc-cl-res-val">0</div>
            <small>Formül: Cl = L / (½·ρ·V²·S)</small>
        </div>
    </div>
    <?php
}
