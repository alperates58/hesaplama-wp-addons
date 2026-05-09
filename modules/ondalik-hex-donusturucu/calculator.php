<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ondalik_hex_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-hex-conv',
        HC_PLUGIN_URL . 'modules/ondalik-hex-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hex-box">
        <h3>Ondalık Hex Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Onluk Sayı (Decimal)</label>
            <input type="number" id="hc-hex-dec" value="255" oninput="hcDecToHex()">
        </div>
        <div class="hc-form-group">
            <label>Onaltılık Sayı (Hex)</label>
            <input type="text" id="hc-hex-str" value="FF" oninput="hcHexToDec()" style="text-transform: uppercase;">
        </div>
    </div>
    <?php
}
