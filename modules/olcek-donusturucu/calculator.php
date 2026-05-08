<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_olcek_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-scale-conv',
        HC_PLUGIN_URL . 'modules/olcek-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-scale-box">
        <h3>Ölçek Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Ölçek (1 / X)</label>
            <input type="number" id="hc-scale-x" value="100000" oninput="hcScaleCalc()">
        </div>
        <div class="hc-form-group">
            <label>Harita Mesafesi (cm)</label>
            <input type="number" id="hc-scale-map" value="1" oninput="hcScaleCalcMap()">
        </div>
        <div class="hc-form-group">
            <label>Gerçek Mesafe (km)</label>
            <input type="number" id="hc-scale-real" value="1" oninput="hcScaleCalcReal()">
        </div>
    </div>
    <?php
}
