<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_polinom_regresyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-polinom-regresyon-hesaplama',
        HC_PLUGIN_URL . 'modules/polinom-regresyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-polinom-regresyon-hesaplama-css',
        HC_PLUGIN_URL . 'modules/polinom-regresyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-polinom-regresyon-hesaplama">
        <h3>Polinom Regresyon Hesaplama (2. Derece)</h3>
        <p>Veri çiftlerini (X, Y) her satıra bir çift gelecek şekilde giriniz. Örn: 1, 2.5</p>
        <div class="hc-form-group">
            <label for="hc-poly-data">Veri Çiftleri (X, Y)</label>
            <textarea id="hc-poly-data" rows="5" placeholder="1, 1&#10;2, 4&#10;3, 9&#10;4, 16"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-poly-predict-x">Tahmin Edilecek X Değeri</label>
            <input type="number" id="hc-poly-predict-x" step="any" placeholder="X değerini girin">
        </div>
        <button class="hc-btn" onclick="hcPolinomRegresyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-polinom-regresyon-hesaplama-result">
            <div id="hc-poly-formula-display"></div>
            <div class="hc-result-value" id="hc-poly-prediction-value"></div>
            <div id="hc-poly-r2" style="margin-top:10px; font-style:italic;"></div>
        </div>
    </div>
    <?php
}
