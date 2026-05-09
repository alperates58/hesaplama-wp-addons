<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yanlis_pozitif_olasiligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-false-pos-prob',
        HC_PLUGIN_URL . 'modules/yanlis-pozitif-olasiligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-false-pos-prob-css',
        HC_PLUGIN_URL . 'modules/yanlis-pozitif-olasiligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-false-pos-prob">
        <h3>Yanlış Pozitif Olasılığı (Bayes)</h3>
        <div class="hc-form-group">
            <label for="hc-fpp-prev">Hastalık Yaygınlığı (Prevalence) [%]</label>
            <input type="number" id="hc-fpp-prev" value="1" step="0.1" min="0" max="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-fpp-sens">Test Duyarlılığı (Sensitivity) [%]</label>
            <input type="number" id="hc-fpp-sens" value="99" step="0.1" min="0" max="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-fpp-spec">Test Özgüllüğü (Specificity) [%]</label>
            <input type="number" id="hc-fpp-spec" value="95" step="0.1" min="0" max="100">
        </div>
        <button class="hc-btn" onclick="hcFalsePosProbHesapla()">Olasılığı Hesapla</button>
        <div class="hc-result" id="hc-false-pos-prob-result">
            <div class="hc-result-item">
                <span>Gerçek Pozitif Olasılığı (PPV):</span>
                <span class="hc-result-value" id="hc-res-fpp-ppv">%0</span>
            </div>
            <div class="hc-result-item">
                <span>Yanlış Pozitif Olasılığı:</span>
                <span id="hc-res-fpp-fp">%0</span>
            </div>
            <p class="hc-fpp-note">Pozitif çıkan bir sonucun aslında hatalı olma olasılığını Bayes teoremi ile gösterir.</p>
        </div>
    </div>
    <?php
}
