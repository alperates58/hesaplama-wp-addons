<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_performans_matrisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-performans-matrisi-hesaplama',
        HC_PLUGIN_URL . 'modules/performans-matrisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-performans-matrisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/performans-matrisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-performans-matrisi-hesaplama">
        <h3>Performans Matrisi Hesaplama</h3>
        <div class="hc-matrix-container">
            <div class="hc-form-group">
                <label for="hc-pm-tp">Doğru Pozitif (TP)</label>
                <input type="number" id="hc-pm-tp" min="0" placeholder="TP">
            </div>
            <div class="hc-form-group">
                <label for="hc-pm-tn">Doğru Negatif (TN)</label>
                <input type="number" id="hc-pm-tn" min="0" placeholder="TN">
            </div>
            <div class="hc-form-group">
                <label for="hc-pm-fp">Yanlış Pozitif (FP)</label>
                <input type="number" id="hc-pm-fp" min="0" placeholder="FP">
            </div>
            <div class="hc-form-group">
                <label for="hc-pm-fn">Yanlış Negatif (FN)</label>
                <input type="number" id="hc-pm-fn" min="0" placeholder="FN">
            </div>
        </div>
        <button class="hc-btn" onclick="hcPerformansMatrisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-performans-matrisi-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-res-item">
                    <span class="hc-label">Doğruluk (Accuracy):</span>
                    <span class="hc-value" id="hc-pm-acc">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Hata Oranı:</span>
                    <span class="hc-value" id="hc-pm-err">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Keskinlik (Precision):</span>
                    <span class="hc-value" id="hc-pm-prec">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Duyarlılık (Recall/Sens):</span>
                    <span class="hc-value" id="hc-pm-rec">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Özgüllük (Specificity):</span>
                    <span class="hc-value" id="hc-pm-spec">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">F1 Skoru:</span>
                    <span class="hc-value" id="hc-pm-f1">-</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
