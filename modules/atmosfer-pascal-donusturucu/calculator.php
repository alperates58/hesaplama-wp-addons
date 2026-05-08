<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_atmosfer_pascal_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-atmosfer-pascal-donusturucu',
        HC_PLUGIN_URL . 'modules/atmosfer-pascal-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-atmosfer-pascal-donusturucu-css',
        HC_PLUGIN_URL . 'modules/atmosfer-pascal-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-atmosfer-pascal-donusturucu">
        <h3>Atmosfer Pascal Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-apd-atm">Atmosfer (atm)</label>
            <input type="number" id="hc-apd-atm" placeholder="atm" step="any" oninput="hcAtmToPa()">
        </div>
        <div class="hc-form-group">
            <label for="hc-apd-pa">Pascal (Pa)</label>
            <input type="number" id="hc-apd-pa" placeholder="Pa" step="any" oninput="hcPaToAtm()">
        </div>
        <div class="hc-result" id="hc-atmosfer-pascal-donusturucu-result">
            <div id="hc-apd-summary"></div>
        </div>
    </div>
    <?php
}
