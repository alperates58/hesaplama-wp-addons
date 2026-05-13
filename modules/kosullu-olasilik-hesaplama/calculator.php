<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kosullu_olasilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kosullu-olasilik-hesaplama',
        HC_PLUGIN_URL . 'modules/kosullu-olasilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kosullu-olasilik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kosullu-olasilik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kosullu-olasilik">
        <h3>Koşullu Olasılık P(A|B) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cond-pab">P(A ∩ B) - A ve B Olaylarının Kesişim Olasılığı:</label>
            <input type="number" id="hc-cond-pab" class="hc-input" step="any" placeholder="Örn: 0.15">
        </div>
        <div class="hc-form-group">
            <label for="hc-cond-pb">P(B) - B Olayının Olasılığı:</label>
            <input type="number" id="hc-cond-pb" class="hc-input" step="any" placeholder="Örn: 0.30">
        </div>
        <button class="hc-btn" onclick="hcKosulluOlasilikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kosullu-olasilik-result">
            <div class="hc-result-label">Koşullu Olasılık P(A|B):</div>
            <div class="hc-result-value" id="hc-res-cond-prob">-</div>
            <p style="margin-top:10px; font-size:0.9em; color:#666;">P(A|B) = P(A ∩ B) / P(B)</p>
        </div>
    </div>
    <?php
}
