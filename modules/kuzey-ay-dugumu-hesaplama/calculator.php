<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kuzey_ay_dugumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kuzey-ay-dugumu-hesaplama',
        HC_PLUGIN_URL . 'modules/kuzey-ay-dugumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kuzey-ay-dugumu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kuzey-ay-dugumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-north-node">
        <h3>Kuzey Ay Düğümü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-knode-date">Doğum Tarihiniz:</label>
            <input type="date" id="hc-knode-date" class="hc-input" value="1990-01-01">
        </div>
        <button class="hc-btn" onclick="hcKuzeyAyDugumuHesapla()">KAD Hesapla</button>
        <div class="hc-result" id="hc-kuzey-node-result">
            <div class="hc-knode-val" id="hc-knode-val">-</div>
            <div id="hc-knode-desc" class="hc-knode-desc"></div>
        </div>
    </div>
    <?php
}
