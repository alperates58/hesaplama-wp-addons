<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karmasiklik_matrisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-karmasiklik-matrisi-hesaplama',
        HC_PLUGIN_URL . 'modules/karmasiklik-matrisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-karmasiklik-matrisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/karmasiklik-matrisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-karmasiklik-matrisi">
        <h3>Karmaşıklık Matrisi (Confusion Matrix)</h3>
        <div class="hc-matrix-grid">
            <div class="hc-form-group">
                <label for="hc-cm-tp">Doğru Pozitif (TP):</label>
                <input type="number" id="hc-cm-tp" class="hc-input" placeholder="Örn: 50">
            </div>
            <div class="hc-form-group">
                <label for="hc-cm-tn">Doğru Negatif (TN):</label>
                <input type="number" id="hc-cm-tn" class="hc-input" placeholder="Örn: 40">
            </div>
            <div class="hc-form-group">
                <label for="hc-cm-fp">Yanlış Pozitif (FP):</label>
                <input type="number" id="hc-cm-fp" class="hc-input" placeholder="Örn: 5">
            </div>
            <div class="hc-form-group">
                <label for="hc-cm-fn">Yanlış Negatif (FN):</label>
                <input type="number" id="hc-cm-fn" class="hc-input" placeholder="Örn: 5">
            </div>
        </div>
        <button class="hc-btn" onclick="hcConfusionMatrixHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-karmasiklik-matrisi-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Doğruluk (Accuracy):</span>
                    <strong id="hc-res-cm-acc">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Kesinlik (Precision):</span>
                    <strong id="hc-res-cm-prec">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Duyarlılık (Recall/Sens.):</span>
                    <strong id="hc-res-cm-rec">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Özgüllük (Specificity):</span>
                    <strong id="hc-res-cm-spec">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>F1 Skoru:</span>
                    <strong id="hc-res-cm-f1">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
