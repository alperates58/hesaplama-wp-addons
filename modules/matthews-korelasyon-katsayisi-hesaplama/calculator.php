<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_matthews_korelasyon_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-matthews-korelasyon-katsayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/matthews-korelasyon-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-matthews-korelasyon-katsayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/matthews-korelasyon-katsayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-matthews-korelasyon-katsayisi-hesaplama">
        <h3>Matthews Korelasyon Katsayısı (MCC)</h3>
        <div class="hc-mcc-grid">
            <div class="hc-form-group">
                <label for="hc-mcc-tp">Doğru Pozitif (TP)</label>
                <input type="number" id="hc-mcc-tp" min="0" value="0">
            </div>
            <div class="hc-form-group">
                <label for="hc-mcc-tn">Doğru Negatif (TN)</label>
                <input type="number" id="hc-mcc-tn" min="0" value="0">
            </div>
            <div class="hc-form-group">
                <label for="hc-mcc-fp">Yanlış Pozitif (FP)</label>
                <input type="number" id="hc-mcc-fp" min="0" value="0">
            </div>
            <div class="hc-form-group">
                <label for="hc-mcc-fn">Yanlış Negatif (FN)</label>
                <input type="number" id="hc-mcc-fn" min="0" value="0">
            </div>
        </div>
        <button class="hc-btn" onclick="hcMccHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-matthews-korelasyon-katsayisi-hesaplama-result">
            <span class="hc-label">MCC Skoru (-1 ile +1 arası):</span>
            <div class="hc-result-value" id="hc-mcc-res-val">0</div>
            <div id="hc-mcc-res-desc" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
