<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nanometre_mikrometre_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-nm-um-conv',
        HC_PLUGIN_URL . 'modules/nanometre-mikrometre-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-nmum-box">
        <h3>Nanometre Mikrometre Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Nanometre (nm)</label>
            <input type="number" id="hc-nmum-nm" value="1000" oninput="hcNmToUm()">
        </div>
        <div class="hc-form-group">
            <label>Mikrometre (µm)</label>
            <input type="number" id="hc-nmum-um" value="1" oninput="hcUmToNm()">
        </div>
    </div>
    <?php
}
