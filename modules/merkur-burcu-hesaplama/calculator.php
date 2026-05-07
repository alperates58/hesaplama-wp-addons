<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_merkur_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-merkur-burcu',
        HC_PLUGIN_URL . 'modules/merkur-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-merkur-burcu-css',
        HC_PLUGIN_URL . 'modules/merkur-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-merkur-burcu-hesaplama">
        <h3>Merkür Burcu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-merkur-tarih">Doğum Tarihi</label>
            <input type="date" id="hc-merkur-tarih">
        </div>
        <button class="hc-btn" onclick="hcMerkurBurcuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-merkur-burcu-result">
            <div class="hc-result-label">Merkür Burcunuz:</div>
            <div class="hc-result-value" id="hc-merkur-value"></div>
            <div class="hc-result-desc" id="hc-merkur-desc"></div>
        </div>
    </div>
    <?php
}
