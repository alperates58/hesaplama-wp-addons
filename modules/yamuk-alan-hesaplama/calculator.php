<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yamuk_alan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-trap-area',
        HC_PLUGIN_URL . 'modules/yamuk-alan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-trap">
        <h3>Yamuk Alan Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ta-a">Alt Taban (a - m):</label>
            <input type="number" id="hc-ta-a" step="any" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-ta-b">Üst Taban (b - m):</label>
            <input type="number" id="hc-ta-b" step="any" placeholder="6">
        </div>
        <div class="hc-form-group">
            <label for="hc-ta-h">Yükseklik (h - m):</label>
            <input type="number" id="hc-ta-h" step="any" placeholder="5">
        </div>
        <button class="hc-btn" onclick="hcTrapAreaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yamuk-alan-result">
            <strong>Alan:</strong>
            <div id="hc-ta-res-val" class="hc-result-value">-</div>
            <span>m²</span>
        </div>
    </div>
    <?php
}
