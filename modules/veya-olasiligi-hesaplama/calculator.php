<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_veya_olasiligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-or-prob',
        HC_PLUGIN_URL . 'modules/veya-olasiligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-or-prob-css',
        HC_PLUGIN_URL . 'modules/veya-olasiligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-or-prob">
        <h3>VEYA Olasılığı P(A ∪ B)</h3>
        <div class="hc-form-group">
            <label for="hc-op-pa">P(A) Olasılığı [%]</label>
            <input type="number" id="hc-op-pa" value="50" min="0" max="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-op-pb">P(B) Olasılığı [%]</label>
            <input type="number" id="hc-op-pb" value="30" min="0" max="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-op-type">Olay Türü</label>
            <select id="hc-op-type" onchange="hcOrProbToggle()">
                <option value="mutually_exclusive">Ayrık Olaylar (Kesişim Yok)</option>
                <option value="independent">Bağımsız Olaylar (Kesişim Var)</option>
                <option value="custom">Özel Kesişim Değeri</option>
            </select>
        </div>
        <div id="hc-op-inter-group" class="hc-form-group" style="display:none">
            <label for="hc-op-pi">P(A ∩ B) Kesişim Olasılığı [%]</label>
            <input type="number" id="hc-op-pi" value="0" min="0" max="100">
        </div>
        <button class="hc-btn" onclick="hcOrProbHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-or-prob-result">
            <div class="hc-result-item">
                <span>P(A VEYA B):</span>
                <span class="hc-result-value" id="hc-res-op-val">%0</span>
            </div>
            <p class="hc-op-note">Formül: P(A) + P(B) - P(A ∩ B)</p>
        </div>
    </div>
    <?php
}
