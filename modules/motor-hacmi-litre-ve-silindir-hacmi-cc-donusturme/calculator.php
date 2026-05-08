<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motor_hacmi_litre_ve_silindir_hacmi_cc_donusturme( $atts ) {
    wp_enqueue_script(
        'hc-engine-vol-conv',
        HC_PLUGIN_URL . 'modules/motor-hacmi-litre-ve-silindir-hacmi-cc-donusturme/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-evc-box-2">
        <h3>Motor Hacmi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Hacim (cc)</label>
            <input type="number" id="hc-evc-input-cc" value="1600" oninput="hcEvc2Convert()">
        </div>
        <div class="hc-result visible">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div><strong>Litre:</strong><br><span id="hc-evc-l">-</span></div>
                <div><strong>Cubic Inch (ci):</strong><br><span id="hc-evc-ci">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
