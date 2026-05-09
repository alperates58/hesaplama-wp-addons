<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fiili_dolasim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-freefloat',
        HC_PLUGIN_URL . 'modules/fiili-dolasim-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-freefloat-css',
        HC_PLUGIN_URL . 'modules/fiili-dolasim-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-freefloat">
        <h3>Fiili Dolaşım Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ff-float">Dolaşımdaki Hisse Adedi</label>
            <input type="number" id="hc-ff-float" placeholder="Halka açık kısım">
        </div>

        <div class="hc-form-group">
            <label for="hc-ff-total">Toplam Hisse Adedi</label>
            <input type="number" id="hc-ff-total" placeholder="Toplam ödenmiş sermaye">
        </div>
        
        <button class="hc-btn" onclick="hcFreeFloatHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-freefloat-result">
            <div class="hc-result-value" id="hc-ff-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Fiili Dolaşım Oranı (%)</p>
        </div>
    </div>
    <?php
}
