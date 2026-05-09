<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_roma_rakami_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-roman-conv',
        HC_PLUGIN_URL . 'modules/roma-rakami-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-roman-box">
        <h3>Roma Rakamı Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Onluk Sayı (1-3999)</label>
            <input type="number" id="hc-roman-dec" value="2026" oninput="hcDecToRoman()">
        </div>
        <div class="hc-form-group">
            <label>Roma Rakamı</label>
            <input type="text" id="hc-roman-str" value="MMXXVI" oninput="hcRomanToDec()" style="text-transform: uppercase;">
        </div>
    </div>
    <?php
}
