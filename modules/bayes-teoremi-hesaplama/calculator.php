<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bayes_teoremi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bayes-teoremi-hesaplama',
        HC_PLUGIN_URL . 'modules/bayes-teoremi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bayes-teoremi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bayes-teoremi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bayes-calc">
        <h3>Bayes Teoremi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bayes-pa">Önsel Olasılık P(A):</label>
            <input type="number" id="hc-bayes-pa" class="hc-input" placeholder="Örn: 0.01" step="0.001">
        </div>
        <div class="hc-form-group">
            <label for="hc-bayes-pba">Koşullu Olasılık P(B|A):</label>
            <input type="number" id="hc-bayes-pba" class="hc-input" placeholder="Örn: 0.99" step="0.001">
        </div>
        <div class="hc-form-group">
            <label for="hc-bayes-pbna">Koşullu Olasılık P(B|A'):</label>
            <input type="number" id="hc-bayes-pbna" class="hc-input" placeholder="Örn: 0.05" step="0.001">
        </div>
        <button class="hc-btn" onclick="hcBayesHesapla()">P(A|B) Hesapla</button>
        <div class="hc-result" id="hc-bayes-teoremi-hesaplama-result">
            <div class="hc-result-label">Sonsal Olasılık P(A|B):</div>
            <div class="hc-result-value" id="hc-res-pab-val">-</div>
            <p style="margin-top:10px; font-size:0.85em; color:#666;">Not: B olayı gerçekleştiğinde A'nın olma olasılığıdır.</p>
        </div>
    </div>
    <?php
}
