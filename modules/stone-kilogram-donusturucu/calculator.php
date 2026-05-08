<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_stone_kilogram_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-stone-kilogram-donusturucu',
        HC_PLUGIN_URL . 'modules/stone-kilogram-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stone-kilogram-donusturucu-css',
        HC_PLUGIN_URL . 'modules/stone-kilogram-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stone-kilogram-donusturucu">
        <h3>Stone Kilogram Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-skd-stone">Stone (st)</label>
            <input type="number" id="hc-skd-stone" placeholder="st" step="any" oninput="hcStoneToKg()">
        </div>
        <div class="hc-form-group">
            <label for="hc-skd-kg">Kilogram (kg)</label>
            <input type="number" id="hc-skd-kg" placeholder="kg" step="any" oninput="hcKgToStone()">
        </div>
        <div class="hc-result" id="hc-stone-kilogram-donusturucu-result">
            <div id="hc-skd-summary"></div>
        </div>
    </div>
    <?php
}
