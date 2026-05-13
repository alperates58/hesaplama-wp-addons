<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beklenen_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beklenen-deger-hesaplama',
        HC_PLUGIN_URL . 'modules/beklenen-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beklenen-deger-hesaplama-css',
        HC_PLUGIN_URL . 'modules/beklenen-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ev-calc">
        <h3>Beklenen Değer (Expected Value) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ev-values">Değerler (x):</label>
            <textarea id="hc-ev-values" class="hc-input" placeholder="Örn: 10, 20, 30"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-ev-probs">Olasılıklar P(x):</label>
            <textarea id="hc-ev-probs" class="hc-input" placeholder="Örn: 0.2, 0.5, 0.3"></textarea>
        </div>
        <button class="hc-btn" onclick="hcEVHesapla()">E[X] Hesapla</button>
        <div class="hc-result" id="hc-beklenen-deger-hesaplama-result">
            <div class="hc-result-label">Beklenen Değer E[X]:</div>
            <div class="hc-result-value" id="hc-res-ev-val">-</div>
            <p id="hc-ev-sum-check" style="margin-top:10px; font-size:0.85em;"></p>
        </div>
    </div>
    <?php
}
