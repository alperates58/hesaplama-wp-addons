<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ters_oranti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-inv-prop',
        HC_PLUGIN_URL . 'modules/ters-oranti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-inv-p">
        <h3>Ters Orantı Hesaplama (a · b = c · x)</h3>
        <div class="hc-form-group">
            <label>a:</label>
            <input type="number" id="hc-ip-a" step="any" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label>b:</label>
            <input type="number" id="hc-ip-b" step="any" placeholder="5">
        </div>
        <div class="hc-form-group">
            <label>c:</label>
            <input type="number" id="hc-ip-c" step="any" placeholder="2">
        </div>
        <button class="hc-btn" onclick="hcInvPropHesapla()">x Değerini Bul</button>
        <div class="hc-result" id="hc-ters-oranti-result">
            <strong>Bilinmeyen Değer (x):</strong>
            <div id="hc-ip-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
