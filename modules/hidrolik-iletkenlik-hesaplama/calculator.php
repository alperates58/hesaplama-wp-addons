<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hidrolik_iletkenlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hyd-cond',
        HC_PLUGIN_URL . 'modules/hidrolik-iletkenlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hyd-cond">
        <h3>Hidrolik İletkenlik (K) Hesaplama</h3>
        <p><small>K = (Q × L) / (A × Δh)</small></p>
        
        <div class="hc-form-group">
            <label>Su Debisi (Q, m³/s)</label>
            <input type="number" id="hc-hc-q" placeholder="m³/s" step="0.0001">
        </div>
        
        <div class="hc-form-group">
            <label>Örnek Uzunluğu (L, metre)</label>
            <input type="number" id="hc-hc-l" placeholder="m" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Kesit Alanı (A, m²)</label>
            <input type="number" id="hc-hc-a" placeholder="m²" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Hidrolik Yük Farkı (Δh, metre)</label>
            <input type="number" id="hc-hc-h" placeholder="m" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcHydCondHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hc-result">
            <span>İletkenlik Katsayısı (K):</span>
            <div class="hc-result-value" id="hc-hc-res-val">0 m/s</div>
        </div>
    </div>
    <?php
}
