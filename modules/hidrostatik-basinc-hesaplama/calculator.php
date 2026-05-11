<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hidrostatik_basinc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hydro-press',
        HC_PLUGIN_URL . 'modules/hidrostatik-basinc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hydro-press">
        <h3>Hidrostatik Basınç Hesaplama</h3>
        <p><small>P = ρ × g × h</small></p>
        
        <div class="hc-form-group">
            <label>Akışkan Yoğunluğu (ρ, kg/m³)</label>
            <input type="number" id="hc-hsp-rho" placeholder="kg/m³" step="1" value="1000">
            <small>Su: 1000, Deniz Suyu: 1025, Yağ: 900</small>
        </div>
        
        <div class="hc-form-group">
            <label>Derinlik (h, metre)</label>
            <input type="number" id="hc-hsp-h" placeholder="m" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcHydroPressHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hsp-result">
            <span>Hidrostatik Basınç (P):</span>
            <div class="hc-result-value" id="hc-hsp-res-val">0 Pascal</div>
            <div id="hc-hsp-res-bar" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 Bar</div>
        </div>
    </div>
    <?php
}
