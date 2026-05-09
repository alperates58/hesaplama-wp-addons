<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_takvimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-moon-cal',
        HC_PLUGIN_URL . 'modules/ay-takvimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-moon-cal-css',
        HC_PLUGIN_URL . 'modules/ay-takvimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ay-takvimi-hesaplama">
        <h3 id="hc-cal-title">Ay Takvimi</h3>
        <div id="hc-cal-container"></div>
        <div class="hc-result" id="hc-cal-result">
            <div class="hc-cal-legend">
                <span>🌑 Yeni Ay</span>
                <span>🌓 İlk Dördün</span>
                <span>🌕 Dolunay</span>
                <span>🌗 Son Dördün</span>
            </div>
        </div>
    </div>
    <?php
}
