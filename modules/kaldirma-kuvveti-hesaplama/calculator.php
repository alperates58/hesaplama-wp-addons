<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kaldirma_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lift-force',
        HC_PLUGIN_URL . 'modules/kaldirma-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lift-force">
        <h3>Kaldırma Kuvveti (Lift) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Kaldırma Katsayısı (Cl)</label>
            <input type="number" id="hc-lf-cl" placeholder="Örn: 0.5" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Hava Yoğunluğu (ρ, kg/m³)</label>
            <input type="number" id="hc-lf-rho" placeholder="1.225" step="0.001" value="1.225">
        </div>
        
        <div class="hc-form-group">
            <label>Hız (V, m/s)</label>
            <input type="number" id="hc-lf-v" placeholder="m/s" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Kanat Alanı (S, m²)</label>
            <input type="number" id="hc-lf-s" placeholder="m²" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcLiftForceHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-lf-result">
            <span>Toplam Kaldırma Kuvveti (L):</span>
            <div class="hc-result-value" id="hc-lf-res-val">0 N</div>
            <div id="hc-lf-res-kg" style="margin-top:5px; font-size:0.9em; opacity:0.8;">~0 kgf</div>
        </div>
    </div>
    <?php
}
