<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_burcuna_gore_ask_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-love-uyum',
        HC_PLUGIN_URL . 'modules/cin-burcuna-gore-ask-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cin-love-uyum-css',
        HC_PLUGIN_URL . 'modules/cin-burcuna-gore-ask-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cin-love-uyum">
        <h3>Çin Burcu Aşk Uyumu</h3>
        <div class="hc-form-group">
            <label>1. Kişinin Doğum Tarihi</label>
            <input type="date" id="hc-cluy-date1" class="hc-input">
        </div>
        <div class="hc-form-group">
            <label>2. Kişinin Doğum Tarihi</label>
            <input type="date" id="hc-cluy-date2" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcCinAskUyumuHesapla()">Uyum Skorunu Gör</button>
        <div class="hc-result" id="hc-cin-love-uyum-result">
            <div class="hc-result-header">Uyum Analizi</div>
            <div id="hc-cluy-content"></div>
        </div>
    </div>
    <?php
}
