<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cakra_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-chakra-calc',
        HC_PLUGIN_URL . 'modules/cakra-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-chakra-calc-css',
        HC_PLUGIN_URL . 'modules/cakra-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cakra-hesaplama">
        <h3>Çakra Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-cakra-date">Doğum Tarihi</label>
            <input type="date" id="hc-cakra-date">
        </div>
        <button class="hc-btn" onclick="hcCakraBul()">Analiz Et</button>
        <div class="hc-result" id="hc-cakra-result">
            <div class="hc-result-label">Baskın Enerji Merkeziniz:</div>
            <div class="hc-result-value" id="hc-cakra-val"></div>
            <div class="hc-result-desc" id="hc-cakra-desc"></div>
        </div>
    </div>
    <?php
}
