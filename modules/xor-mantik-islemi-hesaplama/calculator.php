<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_xor_mantik_islemi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-xor-logic',
        HC_PLUGIN_URL . 'modules/xor-mantik-islemi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-xor-logic">
        <h3>XOR Mantık İşlemi</h3>
        <div class="hc-form-group">
            <label for="hc-xl-val1">1. Değer (Binary):</label>
            <input type="text" id="hc-xl-val1" placeholder="1010">
        </div>
        <div class="hc-form-group">
            <label for="hc-xl-val2">2. Değer (Binary):</label>
            <input type="text" id="hc-xl-val2" placeholder="1100">
        </div>
        <button class="hc-btn" onclick="hcXorLogicHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-xor-logic-result">
            <strong>Sonuç (XOR):</strong>
            <div id="hc-xl-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
