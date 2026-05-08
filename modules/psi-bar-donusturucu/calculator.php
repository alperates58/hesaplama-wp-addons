<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_psi_bar_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-psi-bar-donusturucu',
        HC_PLUGIN_URL . 'modules/psi-bar-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-psi-bar-donusturucu-css',
        HC_PLUGIN_URL . 'modules/psi-bar-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-psi-bar-donusturucu">
        <h3>PSI Bar Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-pbd-psi">PSI (lb/in²)</label>
            <input type="number" id="hc-pbd-psi" placeholder="psi" step="any" oninput="hcPsiToBar()">
        </div>
        <div class="hc-form-group">
            <label for="hc-pbd-bar">Bar</label>
            <input type="number" id="hc-pbd-bar" placeholder="bar" step="any" oninput="hcBarToPsi()">
        </div>
        <div class="hc-result" id="hc-psi-bar-donusturucu-result">
            <div id="hc-pbd-summary"></div>
        </div>
    </div>
    <?php
}
