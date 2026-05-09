<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_saat_dakika_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-h-min-conv',
        HC_PLUGIN_URL . 'modules/saat-dakika-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hmin-box">
        <h3>Saat Dakika Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Saat</label>
            <input type="number" id="hc-hmin-h" value="1" oninput="hcHToMin()">
        </div>
        <div class="hc-form-group">
            <label>Dakika</label>
            <input type="number" id="hc-hmin-min" value="60" oninput="hcMinToH()">
        </div>
    </div>
    <?php
}
