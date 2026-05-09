<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yanlis_pozitif_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-false-positive',
        HC_PLUGIN_URL . 'modules/yanlis-pozitif-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-false-positive-css',
        HC_PLUGIN_URL . 'modules/yanlis-pozitif-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-false-positive">
        <h3>Yanlış Pozitif Oranı (FPR)</h3>
        <div class="hc-form-group">
            <label for="hc-fpr-spec">Özgüllük (Specificity) [%]</label>
            <input type="number" id="hc-fpr-spec" value="95" min="0" max="100" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcFalsePositiveHesapla()">Oranı Hesapla</button>
        <div class="hc-result" id="hc-false-positive-result">
            <div class="hc-result-item">
                <span>Yanlış Pozitif Oranı (FPR):</span>
                <span class="hc-result-value" id="hc-res-fpr-val">%0</span>
            </div>
            <p class="hc-fpr-note">Formül: 100 - Özgüllük. Sağlıklı olup pozitif sonuç alma olasılığını gösterir.</p>
        </div>
    </div>
    <?php
}
