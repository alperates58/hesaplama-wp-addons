<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yazi_tura_atma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coin-flip',
        HC_PLUGIN_URL . 'modules/yazi-tura-atma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-coin-flip-css',
        HC_PLUGIN_URL . 'modules/yazi-tura-atma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-coin-flip">
        <h3>Yazı Tura At</h3>
        <div class="hc-cf-container">
            <div id="hc-cf-coin" class="hc-cf-coin">
                <div class="hc-cf-heads">Yazı</div>
                <div class="hc-cf-tails">Tura</div>
            </div>
        </div>
        <button class="hc-btn" id="hc-cf-btn" onclick="hcCoinFlip()">Parayı At!</button>
        <div class="hc-result visible" id="hc-coin-flip-result">
            <div class="hc-cf-stats">
                <div class="hc-cf-stat-item"> <span>Yazı:</span> <b id="hc-res-cf-heads">0</b> </div>
                <div class="hc-cf-stat-item"> <span>Tura:</span> <b id="hc-res-cf-tails">0</b> </div>
            </div>
            <button class="hc-btn-reset" onclick="hcCoinFlipReset()">Sıfırla</button>
        </div>
    </div>
    <?php
}
