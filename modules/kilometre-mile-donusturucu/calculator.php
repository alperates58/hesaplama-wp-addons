<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kilometre_mile_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-km-mi-conv',
        HC_PLUGIN_URL . 'modules/kilometre-mile-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kmmi-box">
        <h3>Kilometre Mile Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Kilometre (km)</label>
            <input type="number" id="hc-kmmi-km" value="1.609" oninput="hcKmToMi()">
        </div>
        <div class="hc-form-group">
            <label>Mil (mi)</label>
            <input type="number" id="hc-kmmi-mi" value="1" oninput="hcMiToKm()">
        </div>
    </div>
    <?php
}
