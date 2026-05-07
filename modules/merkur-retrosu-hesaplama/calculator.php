<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_merkur_retrosu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mercury-retro',
        HC_PLUGIN_URL . 'modules/merkur-retrosu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mercury-retro-css',
        HC_PLUGIN_URL . 'modules/merkur-retrosu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-merkur-retrosu-hesaplama">
        <h3>Merkür Retrosu Takvimi</h3>
        <p>İletişim gezegeni Merkür şu an geri harekette mi?</p>
        <button class="hc-btn" onclick="hcRetroHesapla()">Durumu Kontrol Et</button>
        <div class="hc-result" id="hc-retro-result">
            <div id="hc-retro-val" class="hc-retro-val"></div>
            <div id="hc-retro-desc" class="hc-retro-desc"></div>
        </div>
    </div>
    <?php
}
