<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_regresyon_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-regresyon-tahmini-hesaplama',
        HC_PLUGIN_URL . 'modules/regresyon-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-regresyon-tahmini-hesaplama-css',
        HC_PLUGIN_URL . 'modules/regresyon-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-regresyon-tahmini-hesaplama">
        <h3>Regresyon Tahmini Hesaplama</h3>
        <p>Veri çiftlerini (X, Y) her satıra bir çift gelecek şekilde giriniz. Örn: 10, 20</p>
        <div class="hc-form-group">
            <label for="hc-reg-data">Veri Çiftleri (X, Y)</label>
            <textarea id="hc-reg-data" rows="5" placeholder="10, 20&#10;15, 25&#10;20, 32"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-reg-predict-x">Tahmin Edilecek X Değeri</label>
            <input type="number" id="hc-reg-predict-x" step="any" placeholder="X değerini girin">
        </div>
        <button class="hc-btn" onclick="hcRegresyonTahminiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-regresyon-tahmini-hesaplama-result">
            <div id="hc-reg-formula-display"></div>
            <div class="hc-result-value" id="hc-reg-prediction-value"></div>
        </div>
    </div>
    <?php
}
