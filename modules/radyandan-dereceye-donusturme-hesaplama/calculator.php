<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_radyandan_dereceye_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rad-deg-conv',
        HC_PLUGIN_URL . 'modules/radyandan-dereceye-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-raddeg-box">
        <h3>Radyandan Dereceye Dönüştürme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Radyan (rad)</label>
            <input type="number" id="hc-raddeg-rad" value="1" oninput="hcRadToDeg()">
        </div>
        <div class="hc-form-group">
            <label>Derece (°)</label>
            <input type="number" id="hc-raddeg-deg" value="57.30" oninput="hcDegToRad()">
        </div>
    </div>
    <?php
}
