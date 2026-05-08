<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mgl_ppm_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-mglppm-conv',
        HC_PLUGIN_URL . 'modules/mgl-ppm-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mglppm-box">
        <h3>mg/L PPM Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Sıvı Yoğunluğu (Su için 1.0)</label>
            <input type="number" id="hc-mglppm-rho" value="1" step="0.01" oninput="hcMglPpmConvert()">
        </div>
        <div class="hc-form-group">
            <label>mg/L Değeri</label>
            <input type="number" id="hc-mglppm-mgl" value="100" oninput="hcMglPpmConvert()">
        </div>
        <div class="hc-result visible">
            <div class="hc-result-title">PPM Karşılığı:</div>
            <div class="hc-result-value" id="hc-mglppm-res">-</div>
        </div>
    </div>
    <?php
}
