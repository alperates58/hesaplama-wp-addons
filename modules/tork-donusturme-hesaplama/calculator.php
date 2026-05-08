<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tork_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-torque-conv',
        HC_PLUGIN_URL . 'modules/tork-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-trq-box">
        <h3>Tork Birim Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Tork (Nm - Newton Metre)</label>
            <input type="number" id="hc-trq-input-nm" value="250" oninput="hcTrqConvert('nm')">
        </div>
        <div class="hc-result visible">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div><strong>lb-ft:</strong><br><span id="hc-trq-lbft">-</span></div>
                <div><strong>kg-m:</strong><br><span id="hc-trq-kgm">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
