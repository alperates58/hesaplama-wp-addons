<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hex_rgb_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-hex-rgb-donusturucu',
        HC_PLUGIN_URL . 'modules/hex-rgb-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hex-rgb-donusturucu-css',
        HC_PLUGIN_URL . 'modules/hex-rgb-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hex-rgb-donusturucu">
        <h3>HEX RGB Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-hrd-hex">HEX Kodu</label>
            <input type="text" id="hc-hrd-hex" placeholder="#FFFFFF" maxlength="7" oninput="hcHexToRgb()">
        </div>
        <div class="hc-result" id="hc-hex-rgb-donusturucu-result">
            <div id="hc-hrd-preview" style="width:100%; height:80px; border-radius:10px; margin-bottom:15px; border:1px solid #ddd;"></div>
            <div id="hc-hrd-output"></div>
        </div>
    </div>
    <?php
}
