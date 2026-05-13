<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_duyarlilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-duyarlilik-hesaplama',
        HC_PLUGIN_URL . 'modules/duyarlilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-duyarlilik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/duyarlilik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sensitivity">
        <h3>Duyarlılık (Sensitivity) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sens-tp">Doğru Pozitif (TP):</label>
            <input type="number" id="hc-sens-tp" class="hc-input" placeholder="Örn: 85">
        </div>
        <div class="hc-form-group">
            <label for="hc-sens-fn">Yanlış Negatif (FN):</label>
            <input type="number" id="hc-sens-fn" class="hc-input" placeholder="Örn: 15">
        </div>
        <button class="hc-btn" onclick="hcSensitivityHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-duyarlilik-hesaplama-result">
            <div class="hc-result-label">Duyarlılık Oranı:</div>
            <div class="hc-result-value" id="hc-res-sens-val">-</div>
            <p style="margin-top:10px; font-size:0.8em; color:#666;">Formül: Duyarlılık = TP / (TP + FN)</p>
        </div>
    </div>
    <?php
}
