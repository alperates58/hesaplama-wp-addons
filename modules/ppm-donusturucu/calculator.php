<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ppm_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-ppm-conv',
        HC_PLUGIN_URL . 'modules/ppm-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ppm-box">
        <h3>PPM Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>PPM Değeri</label>
            <input type="number" id="hc-ppm-val" value="1000" oninput="hcPpmConvert()">
        </div>
        <div class="hc-result visible">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Yüzde (%):</strong><br><span id="hc-ppm-pct">-</span></div>
                <div><strong>mg/L (Su):</strong><br><span id="hc-ppm-mgl">-</span></div>
                <div><strong>ppb:</strong><br><span id="hc-ppm-ppb">-</span></div>
                <div><strong>Ondalık:</strong><br><span id="hc-ppm-dec">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
