<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_joule_kilowatt_saat_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-j-kwh-conv',
        HC_PLUGIN_URL . 'modules/joule-kilowatt-saat-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-jkwh-box">
        <h3>Joule Kilowatt Saat Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Joule (J)</label>
            <input type="number" id="hc-jkwh-j" value="3600000" oninput="hcJToKwh()">
        </div>
        <div class="hc-form-group">
            <label>Kilowatt-saat (kWh)</label>
            <input type="number" id="hc-jkwh-kwh" value="1" oninput="hcKwhToJ()">
        </div>
    </div>
    <?php
}
