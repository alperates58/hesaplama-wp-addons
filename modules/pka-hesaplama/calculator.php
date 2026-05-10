<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pka_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pka-hesaplama',
        HC_PLUGIN_URL . 'modules/pka-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pka-hesaplama-css',
        HC_PLUGIN_URL . 'modules/pka-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pka">
        <h3>pKa Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pk-ka">Asitlik Sabiti (Ka)</label>
            <input type="text" id="hc-pk-ka" placeholder="Örn: 1.8e-5">
        </div>
        <button class="hc-btn" onclick="hcpKaHesapla()">pKa Hesapla</button>
        <div class="hc-result" id="hc-pk-result">
            <div class="hc-result-label">pKa Değeri:</div>
            <div class="hc-result-value" id="hc-pk-val">-</div>
        </div>
    </div>
    <?php
}
