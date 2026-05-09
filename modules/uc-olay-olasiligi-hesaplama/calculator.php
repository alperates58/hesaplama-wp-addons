<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uc_olay_olasiligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-three-prob',
        HC_PLUGIN_URL . 'modules/uc-olay-olasiligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-three-prob-css',
        HC_PLUGIN_URL . 'modules/uc-olay-olasiligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-three-prob">
        <h3>Üç Olayın Kesişimi P(A ∩ B ∩ C)</h3>
        <div class="hc-form-group">
            <label for="hc-tp-a">Olay A [%]</label>
            <input type="number" id="hc-tp-a" value="50" min="0" max="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-tp-b">Olay B [%]</label>
            <input type="number" id="hc-tp-b" value="40" min="0" max="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-tp-c">Olay C [%]</label>
            <input type="number" id="hc-tp-c" value="30" min="0" max="100">
        </div>
        <button class="hc-btn" onclick="hcThreeProbHesapla()">Olasılığı Hesapla</button>
        <div class="hc-result" id="hc-three-prob-result">
            <div class="hc-result-item">
                <span>P(A VE B VE C):</span>
                <span class="hc-result-value" id="hc-res-tp-val">%0</span>
            </div>
            <p class="hc-tp-note">Olayların birbirlerinden bağımsız olduğu varsayılır.</p>
        </div>
    </div>
    <?php
}
