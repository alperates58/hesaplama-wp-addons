<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_santimetre_metre_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-cm-m-conv',
        HC_PLUGIN_URL . 'modules/santimetre-metre-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cmm-box">
        <h3>Santimetre Metre Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Santimetre (cm)</label>
            <input type="number" id="hc-cmm-cm" value="100" oninput="hcCmToM()">
        </div>
        <div class="hc-form-group">
            <label>Metre (m)</label>
            <input type="number" id="hc-cmm-m" value="1" oninput="hcMToCm()">
        </div>
    </div>
    <?php
}
