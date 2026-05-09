<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cakra_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cakra-uyumu',
        HC_PLUGIN_URL . 'modules/cakra-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cakra-uyumu-css',
        HC_PLUGIN_URL . 'modules/cakra-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cakra-uyumu-hesaplama">
        <h3>Çakra Uyumu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cakra-date1">Sizin Doğum Tarihiniz</label>
            <input type="date" id="hc-cakra-date1">
        </div>
        <div class="hc-form-group">
            <label for="hc-cakra-date2">Partnerinizin Doğum Tarihi</label>
            <input type="date" id="hc-cakra-date2">
        </div>
        <button class="hc-btn" onclick="hcCakraUyumuHesapla()">Çakra Uyumunu Bul</button>
        <div class="hc-result" id="hc-cakra-uyumu-result">
            <div class="hc-cakra-info">
                <div>Sizin: <strong id="hc-cakra-val1"></strong></div>
                <div>Partnerin: <strong id="hc-cakra-val2"></strong></div>
            </div>
            <div class="hc-result-label">Enerji Uyum Skoru:</div>
            <div class="hc-result-value" id="hc-cakra-skor"></div>
            <div class="hc-result-desc" id="hc-cakra-desc"></div>
        </div>
    </div>
    <?php
}
