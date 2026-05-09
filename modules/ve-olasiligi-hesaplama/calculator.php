<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ve_olasiligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-and-prob',
        HC_PLUGIN_URL . 'modules/ve-olasiligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-and-prob-css',
        HC_PLUGIN_URL . 'modules/ve-olasiligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-and-prob">
        <h3>VE Olasılığı P(A ∩ B)</h3>
        <div class="hc-form-group">
            <label for="hc-ap-pa">P(A) Olasılığı [%]</label>
            <input type="number" id="hc-ap-pa" value="50" min="0" max="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-ap-type">Bağlantı Türü</label>
            <select id="hc-ap-type" onchange="hcAndProbToggle()">
                <option value="independent">Bağımsız Olaylar</option>
                <option value="dependent">Bağımlı Olaylar</option>
            </select>
        </div>
        <div id="hc-ap-cond-group" class="hc-form-group" style="display:none">
            <label for="hc-ap-pba">P(B|A) Koşullu Olasılık [%]</label>
            <input type="number" id="hc-ap-pba" value="30" min="0" max="100">
        </div>
        <div id="hc-ap-pb-group" class="hc-form-group">
            <label for="hc-ap-pb">P(B) Olasılığı [%]</label>
            <input type="number" id="hc-ap-pb" value="30" min="0" max="100">
        </div>
        <button class="hc-btn" onclick="hcAndProbHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-and-prob-result">
            <div class="hc-result-item">
                <span>P(A VE B):</span>
                <span class="hc-result-value" id="hc-res-ap-val">%0</span>
            </div>
            <p class="hc-ap-note">Formül: P(A) x P(B|A)</p>
        </div>
    </div>
    <?php
}
