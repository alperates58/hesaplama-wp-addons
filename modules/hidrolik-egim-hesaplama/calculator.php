<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hidrolik_egim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hyd-slope',
        HC_PLUGIN_URL . 'modules/hidrolik-egim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hyd-slope">
        <h3>Hidrolik Eğim (Gradyan) Hesaplama</h3>
        <p><small>S = Δh / L</small></p>
        
        <div class="hc-form-group">
            <label>Yük Kaybı / Kot Farkı (Δh, metre)</label>
            <input type="number" id="hc-hs-h" placeholder="m" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Boru / Kanal Uzunluğu (L, metre)</label>
            <input type="number" id="hc-hs-l" placeholder="m" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcHydSlopeHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hs-result">
            <span>Hidrolik Eğim (S):</span>
            <div class="hc-result-value" id="hc-hs-res-val">0</div>
            <div id="hc-hs-res-perc" style="margin-top:5px; font-size:0.9em; opacity:0.8;">%0</div>
        </div>
    </div>
    <?php
}
