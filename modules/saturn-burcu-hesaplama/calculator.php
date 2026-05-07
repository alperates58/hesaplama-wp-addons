<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_saturn_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-saturn-burcu',
        HC_PLUGIN_URL . 'modules/saturn-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-saturn-burcu-css',
        HC_PLUGIN_URL . 'modules/saturn-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-saturn-burcu-hesaplama">
        <h3>Satürn Burcu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-saturn-tarih">Doğum Tarihi</label>
            <input type="date" id="hc-saturn-tarih">
        </div>
        <button class="hc-btn" onclick="hcSaturnBurcuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-saturn-burcu-result">
            <div class="hc-result-label">Satürn Burcunuz:</div>
            <div class="hc-result-value" id="hc-saturn-value"></div>
            <div class="hc-result-desc" id="hc-saturn-desc"></div>
        </div>
    </div>
    <?php
}
