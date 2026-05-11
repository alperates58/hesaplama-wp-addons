<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_basinc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-basinc',
        HC_PLUGIN_URL . 'modules/basinc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-basinc">
        <h3>Basınç Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Uygulanan Kuvvet (F, Newton)</label>
            <input type="number" id="hc-bas-f" placeholder="Örn: 500" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Yüzey Alanı (A, m²)</label>
            <input type="number" id="hc-bas-a" placeholder="Örn: 0.05" step="0.001">
        </div>
        
        <button class="hc-btn" onclick="hcBasincHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bas-result">
            <span>Hesaplanan Basınç (P):</span>
            <div class="hc-result-value" id="hc-bas-res-pa">0 Pa</div>
            <div id="hc-bas-res-bar" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 bar</div>
            <div id="hc-bas-res-psi" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 PSI</div>
        </div>
    </div>
    <?php
}
