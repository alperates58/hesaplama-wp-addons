<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kelvin_celsius_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-k-c-conv',
        HC_PLUGIN_URL . 'modules/kelvin-celsius-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kc-box">
        <h3>Kelvin Celsius Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Kelvin (K)</label>
            <input type="number" id="hc-kc-k" value="273.15" oninput="hcKToC()">
        </div>
        <div class="hc-form-group">
            <label>Celsius (°C)</label>
            <input type="number" id="hc-kc-c" value="0" oninput="hcCToK()">
        </div>
    </div>
    <?php
}
