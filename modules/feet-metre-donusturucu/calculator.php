<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_feet_metre_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-ft-m-conv',
        HC_PLUGIN_URL . 'modules/feet-metre-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ftm-box">
        <h3>Feet Metre Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Feet (ft)</label>
            <input type="number" id="hc-ftm-ft" value="1" oninput="hcFtToM()">
        </div>
        <div class="hc-form-group">
            <label>Metre (m)</label>
            <input type="number" id="hc-ftm-m" value="0.3048" oninput="hcMToFt()">
        </div>
    </div>
    <?php
}
