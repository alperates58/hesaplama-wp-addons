<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_birlesik_olasilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-birlesik-olasilik-hesaplama',
        HC_PLUGIN_URL . 'modules/birlesik-olasilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-birlesik-olasilik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/birlesik-olasilik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-joint-prob">
        <h3>Birleşik Olasılık Hesaplama</h3>
        <p style="font-size:0.9em; color:#666; margin-bottom:15px;">Bağımsız olayların olasılıklarını virgülle ayırarak girin (Örn: 0.5, 0.2, 0.1).</p>
        <div class="hc-form-group">
            <label for="hc-jp-probs">Olay Olasılıkları (P1, P2, ...):</label>
            <input type="text" id="hc-jp-probs" class="hc-input" placeholder="0.5, 0.3">
        </div>
        <button class="hc-btn" onclick="hcJointProbHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-birlesik-olasilik-hesaplama-result">
            <div class="hc-result-label">Birleşik Olasılık (Joint Probability):</div>
            <div class="hc-result-value" id="hc-res-jp-val">-</div>
            <p style="margin-top:10px; font-size:0.85em; color:#666;">Formül: P(A ∩ B ∩ ...) = P(A) * P(B) * ...</p>
        </div>
    </div>
    <?php
}
