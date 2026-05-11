<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hidrolik_basinc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hyd-press',
        HC_PLUGIN_URL . 'modules/hidrolik-basinc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hyd-press">
        <h3>Hidrolik Basınç Hesaplama</h3>
        <p><small>P = F / A</small></p>
        
        <div class="hc-form-group">
            <label>Uygulanan Kuvvet (F, Newton)</label>
            <input type="number" id="hc-hp-f" placeholder="N" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Piston Alanı (A, cm²)</label>
            <input type="number" id="hc-hp-a" placeholder="cm²" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcHydPressHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hp-result">
            <span>Hidrolik Basınç (P):</span>
            <div class="hc-result-value" id="hc-hp-res-val">0 Bar</div>
            <div id="hc-hp-res-pa" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 Pascal</div>
        </div>
    </div>
    <?php
}
