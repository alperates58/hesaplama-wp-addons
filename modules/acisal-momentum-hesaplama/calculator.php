<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_acisal_momentum_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-acisal-momentum-hesaplama',
        HC_PLUGIN_URL . 'modules/acisal-momentum-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-acisal-momentum-hesaplama-css',
        HC_PLUGIN_URL . 'modules/acisal-momentum-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-acisal-momentum-hesaplama">
        <h3>Açısal Momentum Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-am-i">Eylemsizlik Momenti (I - kg·m²)</label>
            <input type="number" id="hc-am-i" placeholder="Örn: 2" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-am-w">Açısal Hız (ω - rad/s)</label>
            <input type="number" id="hc-am-w" placeholder="Örn: 5" step="any">
        </div>
        <button class="hc-btn" onclick="hcAMHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-am-result">
            <div class="hc-result-label">Açısal Momentum (L):</div>
            <div class="hc-result-value" id="hc-am-val">-</div>
            <div class="hc-result-note">L = I * ω</div>
        </div>
    </div>
    <?php
}
