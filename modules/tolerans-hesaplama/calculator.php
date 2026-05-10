<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tolerans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tolerance',
        HC_PLUGIN_URL . 'modules/tolerans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tol">
        <h3>Tolerans Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-t-nominal">Nominal Değer:</label>
            <input type="number" id="hc-t-nominal" step="any" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-t-val">Tolerans Miktarı (±):</label>
            <input type="number" id="hc-t-val" step="any" placeholder="0.5">
        </div>
        <button class="hc-btn" onclick="hcToleranceHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tolerans-result">
            <div style="display:flex; justify-content:space-between; margin-bottom:10px;">
                <strong>Üst Sınır:</strong>
                <span id="hc-t-upper" class="hc-result-value" style="font-size:1.2rem;">-</span>
            </div>
            <div style="display:flex; justify-content:space-between;">
                <strong>Alt Sınır:</strong>
                <span id="hc-t-lower" class="hc-result-value" style="font-size:1.2rem;">-</span>
            </div>
        </div>
    </div>
    <?php
}
