<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_favok_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ebitda',
        HC_PLUGIN_URL . 'modules/favok-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ebitda-css',
        HC_PLUGIN_URL . 'modules/favok-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ebitda">
        <h3>FAVÖK (EBITDA) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-eb-op-profit">Faaliyet Karı (EBIT) (TL)</label>
            <input type="number" id="hc-eb-op-profit" placeholder="Operating Income">
        </div>

        <div class="hc-form-group">
            <label for="hc-eb-depr">Amortisman Giderleri (TL)</label>
            <input type="number" id="hc-eb-depr" placeholder="Depreciation & Amortization">
        </div>
        
        <button class="hc-btn" onclick="hcFAVOKHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ebitda-result">
            <div class="hc-result-value" id="hc-eb-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Faiz, Amortisman ve Vergi Öncesi Kar (FAVÖK)</p>
        </div>
    </div>
    <?php
}
