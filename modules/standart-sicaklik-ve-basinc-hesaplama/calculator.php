<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_standart_sicaklik_ve_basinc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-standart-sicaklik-ve-basinc-hesaplama',
        HC_PLUGIN_URL . 'modules/standart-sicaklik-ve-basinc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-standart-sicaklik-ve-basinc-hesaplama-css',
        HC_PLUGIN_URL . 'modules/standart-sicaklik-ve-basinc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stp">
        <h3>STP / SATP Gaz Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-stp-mol">Gaz Miktarı (mol)</label>
            <input type="number" id="hc-stp-mol" value="1">
        </div>
        <button class="hc-btn" onclick="hcSTPHesapla()">Hacimleri Hesapla</button>
        <div class="hc-result" id="hc-stp-result">
            <div id="hc-stp-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
