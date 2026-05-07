<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_venus_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-venus-burcu',
        HC_PLUGIN_URL . 'modules/venus-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-venus-burcu-css',
        HC_PLUGIN_URL . 'modules/venus-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-venus-burcu-hesaplama">
        <h3>Venüs Burcu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-venus-tarih">Doğum Tarihi</label>
            <input type="date" id="hc-venus-tarih">
        </div>
        <button class="hc-btn" onclick="hcVenusBurcuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-venus-burcu-result">
            <div class="hc-result-label">Venüs Burcunuz:</div>
            <div class="hc-result-value" id="hc-venus-value"></div>
            <div class="hc-result-desc" id="hc-venus-desc"></div>
        </div>
    </div>
    <?php
}
