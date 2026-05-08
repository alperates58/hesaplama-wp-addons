<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kilogram_gram_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-kilogram-gram-donusturucu',
        HC_PLUGIN_URL . 'modules/kilogram-gram-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kilogram-gram-donusturucu-css',
        HC_PLUGIN_URL . 'modules/kilogram-gram-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kilogram-gram-donusturucu">
        <h3>Kilogram Gram Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-kg-deger">Kilogram (kg)</label>
            <input type="number" id="hc-kg-deger" placeholder="kg giriniz" step="any" oninput="hcKgToGram()">
        </div>
        <div class="hc-form-group">
            <label for="hc-g-deger">Gram (g)</label>
            <input type="number" id="hc-g-deger" placeholder="g giriniz" step="any" oninput="hcGramToKg()">
        </div>
        <div class="hc-result" id="hc-kilogram-gram-donusturucu-result">
            <div id="hc-kg-g-summary"></div>
        </div>
    </div>
    <?php
}
