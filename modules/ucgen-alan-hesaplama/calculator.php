<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ucgen_alan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tri-area',
        HC_PLUGIN_URL . 'modules/ucgen-alan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tri-a">
        <h3>Üçgen Alan Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ta-base">Taban (m):</label>
            <input type="number" id="hc-ta-base" step="any" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-ta-height">Yükseklik (m):</label>
            <input type="number" id="hc-ta-height" step="any" placeholder="5">
        </div>
        <button class="hc-btn" onclick="hcTriAreaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ucgen-alan-result">
            <strong>Alan:</strong>
            <div id="hc-ta-res-val" class="hc-result-value">-</div>
            <span>m²</span>
        </div>
    </div>
    <?php
}
