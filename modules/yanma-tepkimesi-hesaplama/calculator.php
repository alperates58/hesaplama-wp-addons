<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yanma_tepkimesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yanma-tepkimesi-hesaplama',
        HC_PLUGIN_URL . 'modules/yanma-tepkimesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yanma-tepkimesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yanma-tepkimesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-combustion">
        <h3>Yanma Tepkimesi Analizi</h3>
        <p style="font-size:0.9em; color:#666;">CxHy + O2 ➔ CO2 + H2O</p>
        <div class="hc-form-group">
            <div style="display:flex; gap:5px; align-items:center;">
                C <input type="number" id="hc-ct-x" value="1" style="width:60px">
                H <input type="number" id="hc-ct-y" value="4" style="width:60px">
            </div>
        </div>
        <button class="hc-btn" onclick="hcYanmaTepkimesiHesapla()">Denkleştir</button>
        <div class="hc-result" id="hc-ct-result">
            <div id="hc-ct-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
