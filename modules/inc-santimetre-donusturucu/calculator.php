<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_inc_santimetre_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-in-cm-conv',
        HC_PLUGIN_URL . 'modules/inc-santimetre-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-incm-box">
        <h3>İnç Santimetre Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>İnç (in)</label>
            <input type="number" id="hc-incm-in" value="1" oninput="hcInToCm()">
        </div>
        <div class="hc-form-group">
            <label>Santimetre (cm)</label>
            <input type="number" id="hc-incm-cm" value="2.54" oninput="hcCmToIn()">
        </div>
    </div>
    <?php
}
