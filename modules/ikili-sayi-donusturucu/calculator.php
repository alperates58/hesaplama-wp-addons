<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ikili_sayi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-bin-conv',
        HC_PLUGIN_URL . 'modules/ikili-sayi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bin-box">
        <h3>İkili Sayı Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Onluk Sayı (Decimal)</label>
            <input type="number" id="hc-bin-dec" value="255" oninput="hcDecToBin()">
        </div>
        <div class="hc-form-group">
            <label>İkilik Sayı (Binary)</label>
            <input type="text" id="hc-bin-str" value="11111111" oninput="hcBinToDec()">
        </div>
    </div>
    <?php
}
