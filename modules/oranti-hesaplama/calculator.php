<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_oranti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-prop',
        HC_PLUGIN_URL . 'modules/oranti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-prop-css',
        HC_PLUGIN_URL . 'modules/oranti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-prop">
        <h3>Orantı Hesaplama (a/b = c/x)</h3>
        <div class="hc-prop-grid">
            <div class="hc-form-group">
                <label>a:</label>
                <input type="number" id="hc-p-a" step="any" placeholder="10">
            </div>
            <div class="hc-form-group">
                <label>c:</label>
                <input type="number" id="hc-p-c" step="any" placeholder="20">
            </div>
            <div class="hc-form-group">
                <label>b:</label>
                <input type="number" id="hc-p-b" step="any" placeholder="5">
            </div>
            <div class="hc-form-group">
                <label>x (Sonuç):</label>
                <input type="text" value="?" disabled style="background:#eee; text-align:center;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcPropHesapla()">x Değerini Bul</button>
        <div class="hc-result" id="hc-prop-result">
            <strong>Bilinmeyen Değer (x):</strong>
            <div id="hc-p-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
