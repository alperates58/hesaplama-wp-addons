<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_poh_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-poh-hesaplama',
        HC_PLUGIN_URL . 'modules/poh-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-poh-hesaplama-css',
        HC_PLUGIN_URL . 'modules/poh-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-poh-general">
        <h3>pOH Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-poh-oh">Hidroksil İyonu Derişimi [OH⁻] (mol/L)</label>
            <input type="text" id="hc-poh-oh" placeholder="Örn: 1.0e-7">
        </div>
        <button class="hc-btn" onclick="hcpOHHesapla()">pOH Hesapla</button>
        <div class="hc-result" id="hc-poh-result">
            <div class="hc-result-label">pOH Değeri:</div>
            <div class="hc-result-value" id="hc-poh-val">-</div>
            <p id="hc-poh-ph" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
