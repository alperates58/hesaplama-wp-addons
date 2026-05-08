<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_favok_carpani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-ebitda',
        HC_PLUGIN_URL . 'modules/favok-carpani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ev-ebitda-css',
        HC_PLUGIN_URL . 'modules/favok-carpani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ev-ebitda">
        <h3>FAVÖK Çarpanı (EV/EBITDA) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ec-ev">Firma Değeri (EV) (TL)</label>
            <input type="number" id="hc-ec-ev" placeholder="Enterprise Value">
        </div>

        <div class="hc-form-group">
            <label for="hc-ec-ebitda">FAVÖK (EBITDA) (TL)</label>
            <input type="number" id="hc-ec-ebitda">
        </div>
        
        <button class="hc-btn" onclick="hcFAVOKCarpaniHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ev-ebitda-result">
            <div class="hc-result-value" id="hc-ec-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">FAVÖK Çarpanı (x)</p>
        </div>
    </div>
    <?php
}
