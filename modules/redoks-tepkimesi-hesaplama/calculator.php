<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_redoks_tepkimesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-redoks-tepkimesi-hesaplama',
        HC_PLUGIN_URL . 'modules/redoks-tepkimesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-redoks-tepkimesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/redoks-tepkimesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-redox">
        <h3>Redoks Analiz Rehberi</h3>
        <p style="font-size:0.9em; color:#666; margin-bottom:15px;">Yaygın redoks tepkimelerini analiz eder.</p>
        <div class="hc-form-group">
            <input type="text" id="hc-rx-input" placeholder="Örn: Zn + Cu2+">
        </div>
        <button class="hc-btn" onclick="hcRedoksTepkimesiHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-rx-result">
            <div id="hc-rx-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
