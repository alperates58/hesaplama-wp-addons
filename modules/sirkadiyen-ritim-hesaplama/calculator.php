<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sirkadiyen_ritim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-circadian',
        HC_PLUGIN_URL . 'modules/sirkadiyen-ritim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-circadian-css',
        HC_PLUGIN_URL . 'modules/sirkadiyen-ritim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-circadian">
        <h3>Sirkadiyen Ritim Planlayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-cr-wake">Sabah Uyanış Saatiniz:</label>
            <input type="time" id="hc-cr-wake" value="07:00">
        </div>
        <button class="hc-btn" onclick="hcCircadianHesapla()">Günlük Planı Oluştur</button>
        <div class="hc-result" id="hc-circadian-result">
            <div class="hc-cr-timeline" id="hc-cr-timeline"></div>
        </div>
    </div>
    <?php
}
