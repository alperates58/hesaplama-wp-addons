<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_guney_ay_dugumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-guney-ay-dugumu-hesaplama',
        HC_PLUGIN_URL . 'modules/guney-ay-dugumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-guney-ay-dugumu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/guney-ay-dugumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-south-node">
        <h3>Güney Ay Düğümü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gnode-date">Doğum Tarihiniz:</label>
            <input type="date" id="hc-gnode-date" class="hc-input" value="1990-01-01">
        </div>
        <button class="hc-btn" onclick="hcGuneyAyDugumuHesapla()">GAD Hesapla</button>
        <div class="hc-result" id="hc-guney-node-result">
            <div class="hc-gnode-val" id="hc-gnode-val">-</div>
            <div id="hc-gnode-desc" class="hc-gnode-desc"></div>
        </div>
    </div>
    <?php
}
