<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dolunay_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-full-moon',
        HC_PLUGIN_URL . 'modules/dolunay-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-full-moon-css',
        HC_PLUGIN_URL . 'modules/dolunay-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dolunay-hesaplama">
        <h3>Dolunay Hesaplama</h3>
        <p>Bir sonraki Dolunay ne zaman?</p>
        <button class="hc-btn" onclick="hcDolunayHesapla()">Hemen Hesapla</button>
        <div class="hc-result" id="hc-full-result">
            <div class="hc-result-label">Bir Sonraki Dolunay:</div>
            <div class="hc-result-value" id="hc-full-val"></div>
            <div class="hc-result-desc" id="hc-full-desc"></div>
        </div>
    </div>
    <?php
}
