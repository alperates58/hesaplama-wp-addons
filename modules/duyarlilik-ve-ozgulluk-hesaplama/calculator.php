<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_duyarlilik_ve_ozgulluk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-duyarlilik-ve-ozgulluk-hesaplama',
        HC_PLUGIN_URL . 'modules/duyarlilik-ve-ozgulluk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-duyarlilik-ve-ozgulluk-hesaplama-css',
        HC_PLUGIN_URL . 'modules/duyarlilik-ve-ozgulluk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sens-spec">
        <h3>Duyarlılık ve Özgüllük Analizi</h3>
        <div class="hc-matrix-grid">
            <div class="hc-form-group">
                <label for="hc-ss-tp">Doğru Pozitif (TP):</label>
                <input type="number" id="hc-ss-tp" class="hc-input" placeholder="Örn: 80">
            </div>
            <div class="hc-form-group">
                <label for="hc-ss-tn">Doğru Negatif (TN):</label>
                <input type="number" id="hc-ss-tn" class="hc-input" placeholder="Örn: 90">
            </div>
            <div class="hc-form-group">
                <label for="hc-ss-fp">Yanlış Pozitif (FP):</label>
                <input type="number" id="hc-ss-fp" class="hc-input" placeholder="Örn: 10">
            </div>
            <div class="hc-form-group">
                <label for="hc-ss-fn">Yanlış Negatif (FN):</label>
                <input type="number" id="hc-ss-fn" class="hc-input" placeholder="Örn: 20">
            </div>
        </div>
        <button class="hc-btn" onclick="hcSensSpecHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-duyarlilik-ve-ozgulluk-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Duyarlılık (Sensitivity):</span>
                    <strong id="hc-res-ss-sens">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Özgüllük (Specificity):</span>
                    <strong id="hc-res-ss-spec">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Pozitif Tahmin Değeri (PPV):</span>
                    <strong id="hc-res-ss-ppv">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Negatif Tahmin Değeri (NPV):</span>
                    <strong id="hc-res-ss-npv">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
