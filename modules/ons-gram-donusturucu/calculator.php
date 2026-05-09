<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ons_gram_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-ons-gram-donusturucu',
        HC_PLUGIN_URL . 'modules/ons-gram-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ons-gram-donusturucu-css',
        HC_PLUGIN_URL . 'modules/ons-gram-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ons-gram-donusturucu">
        <h3>Ons Gram Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-ogd-ons">Ons (oz)</label>
            <input type="number" id="hc-ogd-ons" placeholder="oz" step="any" oninput="hcOnsToGram()">
        </div>
        <div class="hc-form-group">
            <label for="hc-ogd-gram">Gram (g)</label>
            <input type="number" id="hc-ogd-gram" placeholder="g" step="any" oninput="hcGramToOns()">
        </div>
        <div class="hc-result" id="hc-ons-gram-donusturucu-result">
            <div id="hc-ogd-summary"></div>
        </div>
    </div>
    <?php
}
