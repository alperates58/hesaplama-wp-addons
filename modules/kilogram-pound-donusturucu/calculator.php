<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kilogram_pound_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-kilogram-pound-donusturucu',
        HC_PLUGIN_URL . 'modules/kilogram-pound-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kilogram-pound-donusturucu-css',
        HC_PLUGIN_URL . 'modules/kilogram-pound-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kilogram-pound-donusturucu">
        <h3>Kilogram Pound Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-kpl-kg">Kilogram (kg)</label>
            <input type="number" id="hc-kpl-kg" placeholder="kg" step="any" oninput="hcKgToLb()">
        </div>
        <div class="hc-form-group">
            <label for="hc-kpl-lb">Pound (lb)</label>
            <input type="number" id="hc-kpl-lb" placeholder="lb" step="any" oninput="hcLbToKg()">
        </div>
        <div class="hc-result" id="hc-kilogram-pound-donusturucu-result">
            <div id="hc-kpl-summary"></div>
        </div>
    </div>
    <?php
}
