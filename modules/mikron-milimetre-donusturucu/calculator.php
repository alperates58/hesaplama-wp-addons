<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mikron_milimetre_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-um-mm-conv',
        HC_PLUGIN_URL . 'modules/mikron-milimetre-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ummm-box">
        <h3>Mikron Milimetre Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Mikron (µm)</label>
            <input type="number" id="hc-ummm-um" value="1000" oninput="hcUmToMm()">
        </div>
        <div class="hc-form-group">
            <label>Milimetre (mm)</label>
            <input type="number" id="hc-ummm-mm" value="1" oninput="hcMmToUm()">
        </div>
    </div>
    <?php
}
