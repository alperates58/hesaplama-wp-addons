<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ton_kilogram_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-ton-kilogram-donusturucu',
        HC_PLUGIN_URL . 'modules/ton-kilogram-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ton-kilogram-donusturucu-css',
        HC_PLUGIN_URL . 'modules/ton-kilogram-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ton-kilogram-donusturucu">
        <h3>Ton Kilogram Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-tkd-ton">Ton (t)</label>
            <input type="number" id="hc-tkd-ton" placeholder="t" step="any" oninput="hcTonToKg()">
        </div>
        <div class="hc-form-group">
            <label for="hc-tkd-kg">Kilogram (kg)</label>
            <input type="number" id="hc-tkd-kg" placeholder="kg" step="any" oninput="hcKgToTon()">
        </div>
        <div class="hc-result" id="hc-ton-kilogram-donusturucu-result">
            <div id="hc-tkd-summary"></div>
        </div>
    </div>
    <?php
}
