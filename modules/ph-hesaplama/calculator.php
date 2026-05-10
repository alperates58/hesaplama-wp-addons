<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ph_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ph-hesaplama',
        HC_PLUGIN_URL . 'modules/ph-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ph-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ph-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ph-general">
        <h3>pH Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ph-h">Hidrojen İyonu Derişimi [H⁺] (mol/L)</label>
            <input type="text" id="hc-ph-h" placeholder="Örn: 1.0e-7">
        </div>
        <button class="hc-btn" onclick="hcpHHesapla()">pH Hesapla</button>
        <div class="hc-result" id="hc-ph-result">
            <div class="hc-result-label">pH Değeri:</div>
            <div class="hc-result-value" id="hc-ph-val">-</div>
            <p id="hc-ph-desc" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
