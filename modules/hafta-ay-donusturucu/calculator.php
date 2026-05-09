<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hafta_ay_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-w-mo-conv',
        HC_PLUGIN_URL . 'modules/hafta-ay-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-wmo-box">
        <h3>Hafta Ay Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Hafta</label>
            <input type="number" id="hc-wmo-w" value="4.35" oninput="hcWToMo()">
        </div>
        <div class="hc-form-group">
            <label>Ay</label>
            <input type="number" id="hc-wmo-mo" value="1" oninput="hcMoToW()">
        </div>
        <div class="hc-result visible">
            <p style="font-size: 0.85em; color: #666;">* 1 ay ortalama 4,345 hafta kabul edilmiştir.</p>
        </div>
    </div>
    <?php
}
