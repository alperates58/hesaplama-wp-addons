<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cevresel_gerilme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hoop-stress',
        HC_PLUGIN_URL . 'modules/cevresel-gerilme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hoop-stress">
        <h3>Çevresel Gerilme (Hoop Stress) Hesaplama</h3>
        <p><small>σ = (P · D) / (2 · t)</small></p>
        
        <div class="hc-form-group">
            <label>İç Basınç (P, bar)</label>
            <input type="number" id="hc-cg-p" placeholder="bar" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>İç Çap (D, mm)</label>
            <input type="number" id="hc-cg-d" placeholder="mm" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Et Kalınlığı (t, mm)</label>
            <input type="number" id="hc-cg-t" placeholder="mm" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcHoopStressHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cg-result">
            <span>Çevresel Gerilme (σ):</span>
            <div class="hc-result-value" id="hc-cg-res-mpa">0 MPa</div>
            <div id="hc-cg-res-pa" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 N/mm²</div>
        </div>
    </div>
    <?php
}
