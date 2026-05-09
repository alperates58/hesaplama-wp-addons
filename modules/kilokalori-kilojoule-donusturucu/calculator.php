<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kilokalori_kilojoule_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-kcal-kj-conv',
        HC_PLUGIN_URL . 'modules/kilokalori-kilojoule-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kckj-box">
        <h3>Kilokalori Kilojoule Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Kilokalori (kcal)</label>
            <input type="number" id="hc-kckj-kcal" value="1" oninput="hcKcalToKj()">
        </div>
        <div class="hc-form-group">
            <label>Kilojoule (kJ)</label>
            <input type="number" id="hc-kckj-kj" value="4.184" oninput="hcKjToKcal()">
        </div>
    </div>
    <?php
}
