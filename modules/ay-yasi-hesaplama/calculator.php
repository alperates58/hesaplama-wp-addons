<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_yasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-moon-age',
        HC_PLUGIN_URL . 'modules/ay-yasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-moon-age-css',
        HC_PLUGIN_URL . 'modules/ay-yasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ay-yasi-hesaplama">
        <h3>Ay Yaşı Hesaplama</h3>
        <p>Ay şu an döngüsünün kaçıncı gününde?</p>
        <button class="hc-btn" onclick="hcAyYasiHesapla()">Yaşı Hesapla</button>
        <div class="hc-result" id="hc-age-result">
            <div class="hc-result-label">Ay'ın Yaşı:</div>
            <div class="hc-result-value" id="hc-age-val"></div>
            <div class="hc-result-desc" id="hc-age-desc"></div>
        </div>
    </div>
    <?php
}
