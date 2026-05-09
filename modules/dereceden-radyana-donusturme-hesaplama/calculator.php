<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dereceden_radyana_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-deg-rad-conv',
        HC_PLUGIN_URL . 'modules/dereceden-radyana-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-degrad-box">
        <h3>Dereceden Radyana Dönüştürme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Derece (°)</label>
            <input type="number" id="hc-degrad-deg" value="180" oninput="hcDegToRad()">
        </div>
        <div class="hc-form-group">
            <label>Radyan (rad)</label>
            <input type="number" id="hc-degrad-rad" value="3.14159" oninput="hcRadToDeg()">
        </div>
    </div>
    <?php
}
