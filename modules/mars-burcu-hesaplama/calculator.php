<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mars_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mars-burcu',
        HC_PLUGIN_URL . 'modules/mars-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mars-burcu-css',
        HC_PLUGIN_URL . 'modules/mars-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mars-burcu-hesaplama">
        <h3>Mars Burcu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mars-tarih">Doğum Tarihi</label>
            <input type="date" id="hc-mars-tarih">
        </div>
        <button class="hc-btn" onclick="hcMarsBurcuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mars-burcu-result">
            <div class="hc-result-label">Mars Burcunuz:</div>
            <div class="hc-result-value" id="hc-mars-value"></div>
            <div class="hc-result-desc" id="hc-mars-desc"></div>
        </div>
    </div>
    <?php
}
