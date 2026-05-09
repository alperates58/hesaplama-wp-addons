<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yeni_ay_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-new-moon',
        HC_PLUGIN_URL . 'modules/yeni-ay-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-new-moon-css',
        HC_PLUGIN_URL . 'modules/yeni-ay-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yeni-ay-hesaplama">
        <h3>Yeni Ay Hesaplama</h3>
        <p>Bir sonraki Yeni Ay ne zaman?</p>
        <button class="hc-btn" onclick="hcYeniAyHesapla()">Hemen Hesapla</button>
        <div class="hc-result" id="hc-new-result">
            <div class="hc-result-label">Bir Sonraki Yeni Ay:</div>
            <div class="hc-result-value" id="hc-new-val"></div>
            <div class="hc-result-desc" id="hc-new-desc"></div>
        </div>
    </div>
    <?php
}
