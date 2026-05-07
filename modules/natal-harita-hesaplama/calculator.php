<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_natal_harita_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-natal-calc',
        HC_PLUGIN_URL . 'modules/natal-harita-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-natal-calc-css',
        HC_PLUGIN_URL . 'modules/natal-harita-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-natal-harita-hesaplama">
        <h3>Natal Harita Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-natal-date">Doğum Tarihi</label>
            <input type="date" id="hc-natal-date">
        </div>
        <div class="hc-form-group">
            <label for="hc-natal-time">Doğum Saati</label>
            <input type="time" id="hc-natal-time">
        </div>
        <button class="hc-btn" onclick="hcNatalHesapla()">Potansiyellerini Keşfet</button>
        <div class="hc-result" id="hc-natal-result">
            <div class="hc-result-value" id="hc-natal-val"></div>
            <div class="hc-result-desc" id="hc-natal-desc"></div>
        </div>
    </div>
    <?php
}
