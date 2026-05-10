<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_or_mantik_islemi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-or-logic',
        HC_PLUGIN_URL . 'modules/or-mantik-islemi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-or-logic">
        <h3>OR Mantık İşlemi</h3>
        <div class="hc-form-group">
            <label for="hc-ol-val1">1. Değer (Binary):</label>
            <input type="text" id="hc-ol-val1" placeholder="1010">
        </div>
        <div class="hc-form-group">
            <label for="hc-ol-val2">2. Değer (Binary):</label>
            <input type="text" id="hc-ol-val2" placeholder="1100">
        </div>
        <button class="hc-btn" onclick="hcOrLogicHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-or-logic-result">
            <strong>Sonuç (OR):</strong>
            <div id="hc-ol-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
