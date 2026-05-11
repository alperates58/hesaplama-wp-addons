<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_derinlige_gore_su_basinci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-su-basinci',
        HC_PLUGIN_URL . 'modules/derinlige-gore-su-basinci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-su-basinci">
        <h3>Derinliğe Göre Su Basıncı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Su Derinliği (h, metre)</label>
            <input type="number" id="hc-sb-h" placeholder="Örn: 10" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Su Yoğunluğu (ρ, kg/m³)</label>
            <input type="number" id="hc-sb-rho" value="1000" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcSuBasinciHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-sb-result">
            <span>Hidrostatik Basınç (P):</span>
            <div class="hc-result-value" id="hc-sb-res-pa">0 Pa</div>
            <div id="hc-sb-res-bar" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 bar</div>
            <div id="hc-sb-res-psi" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 PSI</div>
        </div>
    </div>
    <?php
}
