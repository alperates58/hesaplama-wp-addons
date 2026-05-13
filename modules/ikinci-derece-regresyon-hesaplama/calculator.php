<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ikinci_derece_regresyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ikinci-derece-regresyon-hesaplama',
        HC_PLUGIN_URL . 'modules/ikinci-derece-regresyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ikinci-derece-regresyon-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ikinci-derece-regresyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ikinci-derece-regresyon">
        <h3>İkinci Derece (Parabolik) Regresyon</h3>
        <div class="hc-form-group">
            <label for="hc-quad-x">X Veri Seti (Bağımsız Değişken):</label>
            <textarea id="hc-quad-x" class="hc-input" placeholder="Örn: 1, 2, 3, 4, 5"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-quad-y">Y Veri Seti (Bağımlı Değişken):</label>
            <textarea id="hc-quad-y" class="hc-input" placeholder="Örn: 2, 5, 10, 17, 26"></textarea>
        </div>
        <button class="hc-btn" onclick="hcQuadraticRegressionHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ikinci-derece-regresyon-result">
            <div class="hc-result-label">Regresyon Denklemi:</div>
            <div id="hc-res-quad-eq" style="font-size: 1.2rem; font-weight: bold; color: #2c3e50; margin-bottom: 15px;">-</div>
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>a katsayısı (x²):</span>
                    <strong id="hc-res-quad-a">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>b katsayısı (x):</span>
                    <strong id="hc-res-quad-b">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>c katsayısı (sabit):</span>
                    <strong id="hc-res-quad-c">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>R² Değeri:</span>
                    <strong id="hc-res-quad-r2">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
