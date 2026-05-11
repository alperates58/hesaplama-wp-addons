<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kesit_modulu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-section-modulus',
        HC_PLUGIN_URL . 'modules/kesit-modulu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-section-modulus">
        <h3>Kesit Modülü (S) Hesaplama</h3>
        <p><small>Dikdörtgen Kesit: S = (b × h²) / 6</small></p>
        
        <div class="hc-form-group">
            <label>Genişlik (b, mm)</label>
            <input type="number" id="hc-sm-b" placeholder="mm" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Yükseklik (h, mm)</label>
            <input type="number" id="hc-sm-h" placeholder="mm" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcSectionModulusHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-sm-result">
            <span>Kesit Modülü (S):</span>
            <div class="hc-result-value" id="hc-sm-res-val">0 mm³</div>
            <div id="hc-sm-res-cm3" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 cm³</div>
        </div>
    </div>
    <?php
}
