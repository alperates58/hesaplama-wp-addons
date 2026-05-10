<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uyanma_saati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uyanma-saati',
        HC_PLUGIN_URL . 'modules/uyanma-saati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-uyanma-saati-css',
        HC_PLUGIN_URL . 'modules/uyanma-saati-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-uyanma-saati">
        <h3>Uyanma Saati Hesaplama</h3>
        <p>Ne zaman yatacaksınız?</p>
        <div class="hc-form-group">
            <label for="hc-ua-sleep">Yatış Saati:</label>
            <input type="time" id="hc-ua-sleep" value="23:00">
        </div>
        <button class="hc-btn" onclick="hcUyanmaSaatiHesapla()">Uyanış Saatlerini Bul</button>
        <div class="hc-result" id="hc-uyanma-saati-result">
            <div id="hc-ua-res-list" class="hc-ua-list"></div>
        </div>
    </div>
    <?php
}
