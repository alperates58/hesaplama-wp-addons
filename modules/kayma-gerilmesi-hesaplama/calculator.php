<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kayma_gerilmesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-shear-stress',
        HC_PLUGIN_URL . 'modules/kayma-gerilmesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-shear-stress">
        <h3>Kayma Gerilmesi (τ) Hesaplama</h3>
        <p><small>τ = V / A</small></p>
        
        <div class="hc-form-group">
            <label>Kayma Kuvveti (V, Newton)</label>
            <input type="number" id="hc-ss-v" placeholder="N" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Kesit Alanı (A, mm²)</label>
            <input type="number" id="hc-ss-a" placeholder="mm²" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcShearStressHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ss-result">
            <span>Kayma Gerilmesi (τ):</span>
            <div class="hc-result-value" id="hc-ss-res-val">0 MPa</div>
        </div>
    </div>
    <?php
}
