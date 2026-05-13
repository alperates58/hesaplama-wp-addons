<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogruluk_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dogruluk-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/dogruluk-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dogruluk-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dogruluk-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-accuracy">
        <h3>Doğruluk Oranı (Accuracy) Hesaplama</h3>
        <div class="hc-matrix-grid">
            <div class="hc-form-group">
                <label for="hc-acc-tp">Doğru Pozitif (TP):</label>
                <input type="number" id="hc-acc-tp" class="hc-input" placeholder="Örn: 45">
            </div>
            <div class="hc-form-group">
                <label for="hc-acc-tn">Doğru Negatif (TN):</label>
                <input type="number" id="hc-acc-tn" class="hc-input" placeholder="Örn: 45">
            </div>
            <div class="hc-form-group">
                <label for="hc-acc-fp">Yanlış Pozitif (FP):</label>
                <input type="number" id="hc-acc-fp" class="hc-input" placeholder="Örn: 5">
            </div>
            <div class="hc-form-group">
                <label for="hc-acc-fn">Yanlış Negatif (FN):</label>
                <input type="number" id="hc-acc-fn" class="hc-input" placeholder="Örn: 5">
            </div>
        </div>
        <button class="hc-btn" onclick="hcAccuracyHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dogruluk-orani-hesaplama-result">
            <div class="hc-result-label">Doğruluk Oranı:</div>
            <div class="hc-result-value" id="hc-res-acc-val">-</div>
            <p style="margin-top:10px; font-size:0.8em; color:#666;">Formül: Accuracy = (TP + TN) / Toplam</p>
        </div>
    </div>
    <?php
}
