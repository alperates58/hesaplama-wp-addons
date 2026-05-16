<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_gunundeki_ay_evresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dogum-gunundeki-ay-evresi-hesaplama',
        HC_PLUGIN_URL . 'modules/dogum-gunundeki-ay-evresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dogum-gunundeki-ay-evresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dogum-gunundeki-ay-evresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-birth-moon">
        <h3>Doğum Günündeki Ay Evresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bm-date">Doğum Tarihi:</label>
            <input type="date" id="hc-bm-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcBirthMoonPhaseHesapla()">Ay Evresini Hesapla</button>
        <div class="hc-result" id="hc-birth-moon-result">
            <div id="hc-bm-phase-name" class="hc-bm-phase-name"></div>
            <div id="hc-bm-desc" class="hc-bm-desc"></div>
        </div>
    </div>
    <?php
}
