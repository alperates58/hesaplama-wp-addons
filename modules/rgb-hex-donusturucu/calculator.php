<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rgb_hex_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-rgb-hex-donusturucu',
        HC_PLUGIN_URL . 'modules/rgb-hex-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rgb-hex-donusturucu-css',
        HC_PLUGIN_URL . 'modules/rgb-hex-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rgb-hex-donusturucu">
        <h3>RGB HEX Dönüştürücü</h3>
        <div style="display:flex; gap:10px;">
            <div class="hc-form-group" style="flex:1;">
                <label for="hc-rhd-r">R (Red)</label>
                <input type="number" id="hc-rhd-r" placeholder="0-255" min="0" max="255" oninput="hcRgbToHex()">
            </div>
            <div class="hc-form-group" style="flex:1;">
                <label for="hc-rhd-g">G (Green)</label>
                <input type="number" id="hc-rhd-g" placeholder="0-255" min="0" max="255" oninput="hcRgbToHex()">
            </div>
            <div class="hc-form-group" style="flex:1;">
                <label for="hc-rhd-b">B (Blue)</label>
                <input type="number" id="hc-rhd-b" placeholder="0-255" min="0" max="255" oninput="hcRgbToHex()">
            </div>
        </div>
        <div class="hc-result" id="hc-rgb-hex-donusturucu-result">
            <div id="hc-rhd-preview" style="width:100%; height:80px; border-radius:10px; margin-bottom:15px; border:1px solid #ddd;"></div>
            <div id="hc-rhd-output"></div>
        </div>
    </div>
    <?php
}
