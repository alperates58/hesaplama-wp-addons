<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gun_saat_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-d-h-conv',
        HC_PLUGIN_URL . 'modules/gun-saat-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dh-box">
        <h3>Gün Saat Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Gün</label>
            <input type="number" id="hc-dh-d" value="1" oninput="hcDToH()">
        </div>
        <div class="hc-form-group">
            <label>Saat</label>
            <input type="number" id="hc-dh-h" value="24" oninput="hcHToD()">
        </div>
    </div>
    <?php
}
