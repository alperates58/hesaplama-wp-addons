<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_favok_marji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ebitda-margin',
        HC_PLUGIN_URL . 'modules/favok-marji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ebitda-margin-css',
        HC_PLUGIN_URL . 'modules/favok-marji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ebitda-margin">
        <h3>FAVÖK Marjı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-em-ebitda">FAVÖK (TL)</label>
            <input type="number" id="hc-em-ebitda">
        </div>

        <div class="hc-form-group">
            <label for="hc-em-revenue">Toplam Net Satışlar (TL)</label>
            <input type="number" id="hc-em-revenue">
        </div>
        
        <button class="hc-btn" onclick="hcFAVOKMarjiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ebitda-margin-result">
            <div class="hc-result-value" id="hc-em-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">FAVÖK Marjı (%)</p>
        </div>
    </div>
    <?php
}
