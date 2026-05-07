<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_jupiter_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-jupiter-burcu',
        HC_PLUGIN_URL . 'modules/jupiter-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-jupiter-burcu-css',
        HC_PLUGIN_URL . 'modules/jupiter-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-jupiter-burcu-hesaplama">
        <h3>Jüpiter Burcu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-jupiter-tarih">Doğum Tarihi</label>
            <input type="date" id="hc-jupiter-tarih">
        </div>
        <button class="hc-btn" onclick="hcJupiterBurcuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-jupiter-burcu-result">
            <div class="hc-result-label">Jüpiter Burcunuz:</div>
            <div class="hc-result-value" id="hc-jupiter-value"></div>
            <div class="hc-result-desc" id="hc-jupiter-desc"></div>
        </div>
    </div>
    <?php
}
