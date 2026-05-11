<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_diferansiyel_basinc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-diferansiyel-basinc',
        HC_PLUGIN_URL . 'modules/diferansiyel-basinc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-diferansiyel-basinc">
        <h3>Diferansiyel Basınç Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Basınç 1 (P₁, bar)</label>
            <input type="number" id="hc-dp-p1" placeholder="P1" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Basınç 2 (P₂, bar)</label>
            <input type="number" id="hc-dp-p2" placeholder="P2" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcDiferansiyelBasincHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-dp-result">
            <span>Basınç Farkı (ΔP):</span>
            <div class="hc-result-value" id="hc-dp-res-bar">0 bar</div>
            <div id="hc-dp-res-pa" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 Pa (Pascal)</div>
            <div id="hc-dp-res-psi" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 PSI</div>
        </div>
    </div>
    <?php
}
