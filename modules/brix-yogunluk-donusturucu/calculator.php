<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_brix_yogunluk_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-brix-conv',
        HC_PLUGIN_URL . 'modules/brix-yogunluk-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-brix-box">
        <h3>Brix Yoğunluk Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Brix (°Bx)</label>
            <input type="number" id="hc-brix-val" value="10" step="0.1" oninput="hcBrixToSg()">
        </div>
        <div class="hc-form-group">
            <label>Özgül Ağırlık (SG)</label>
            <input type="number" id="hc-brix-sg" value="1.040" step="0.001" oninput="hcSgToBrix()">
        </div>
    </div>
    <?php
}
