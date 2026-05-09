<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_celsius_fahrenheit_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-c-f-conv',
        HC_PLUGIN_URL . 'modules/celsius-fahrenheit-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cf-box">
        <h3>Celsius Fahrenheit Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Celsius (°C)</label>
            <input type="number" id="hc-cf-c" value="0" oninput="hcCToF()">
        </div>
        <div class="hc-form-group">
            <label>Fahrenheit (°F)</label>
            <input type="number" id="hc-cf-f" value="32" oninput="hcFToC()">
        </div>
    </div>
    <?php
}
