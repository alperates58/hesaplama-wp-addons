<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uyanma_saati_planlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wake-plan',
        HC_PLUGIN_URL . 'modules/uyanma-saati-planlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wake-plan-css',
        HC_PLUGIN_URL . 'modules/uyanma-saati-planlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wake-plan">
        <h3>Uyanış Zamanı Planlayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-wp-sleep">Ne Zaman Yatacaksınız?</label>
            <input type="time" id="hc-wp-sleep" value="23:30">
        </div>
        <button class="hc-btn" onclick="hcWakePlanHesapla()">Uyanış Planını Gör</button>
        <div class="hc-result" id="hc-wake-plan-result">
            <div id="hc-wp-res-list" class="hc-wp-list"></div>
        </div>
    </div>
    <?php
}
