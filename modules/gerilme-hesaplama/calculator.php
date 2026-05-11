<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gerilme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stress-calc',
        HC_PLUGIN_URL . 'modules/gerilme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-stress-calc">
        <h3>Mühendislik Gerilmesi (σ) Hesaplama</h3>
        <p><small>σ = F / A₀</small></p>
        
        <div class="hc-form-group">
            <label>Uygulanan Kuvvet (F, Newton)</label>
            <input type="number" id="hc-st-f" placeholder="N" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Kesit Alanı (A₀, mm²)</label>
            <input type="number" id="hc-st-a" placeholder="mm²" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcStressCalcHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-st-result">
            <span>Normal Gerilme (σ):</span>
            <div class="hc-result-value" id="hc-st-res-val">0 MPa</div>
        </div>
    </div>
    <?php
}
