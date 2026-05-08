<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yakit_debisi_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-flow-conv',
        HC_PLUGIN_URL . 'modules/yakit-debisi-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fc-box">
        <h3>Yakıt Debisi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer (cc/min)</label>
            <input type="number" id="hc-fc-input" value="440" oninput="hcFcConvert()">
        </div>
        <div class="hc-result visible">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div><strong>lbs/hr:</strong><br><span id="hc-fc-lbs">-</span></div>
                <div><strong>g/s:</strong><br><span id="hc-fc-gs">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
