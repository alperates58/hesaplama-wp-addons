<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pascal_bar_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-pascal-bar-donusturucu',
        HC_PLUGIN_URL . 'modules/pascal-bar-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pascal-bar-donusturucu-css',
        HC_PLUGIN_URL . 'modules/pascal-bar-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pascal-bar-donusturucu">
        <h3>Pascal Bar Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-pabd-pa">Pascal (Pa)</label>
            <input type="number" id="hc-pabd-pa" placeholder="Pa" step="any" oninput="hcPaToBar()">
        </div>
        <div class="hc-form-group">
            <label for="hc-pabd-bar">Bar</label>
            <input type="number" id="hc-pabd-bar" placeholder="bar" step="any" oninput="hcBarToPa()">
        </div>
        <div class="hc-result" id="hc-pascal-bar-donusturucu-result">
            <div id="hc-pabd-summary"></div>
        </div>
    </div>
    <?php
}
