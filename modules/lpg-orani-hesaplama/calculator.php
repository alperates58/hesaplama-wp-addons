<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lpg_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lpg-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/lpg-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lpg-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/lpg-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lpg-ratio">
        <h3>LPG Karışım Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-lr-propane">Propan Oranı (% Hacimce)</label>
            <input type="number" id="hc-lr-propane" value="30" max="100" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-lr-butane">Bütan Oranı (% Hacimce)</label>
            <input type="number" id="hc-lr-butane" value="70" max="100" min="0">
        </div>
        <button class="hc-btn" onclick="hcLPGOranıHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-lr-result">
            <div id="hc-lr-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
