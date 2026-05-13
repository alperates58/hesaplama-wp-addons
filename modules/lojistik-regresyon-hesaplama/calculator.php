<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lojistik_regresyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lojistik-regresyon-hesaplama',
        HC_PLUGIN_URL . 'modules/lojistik-regresyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lojistik-regresyon-hesaplama-css',
        HC_PLUGIN_URL . 'modules/lojistik-regresyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lojistik-regresyon-hesaplama">
        <h3>Lojistik Regresyon (Sigmoid) Hesaplama</h3>
        <p>Model: P(Y=1) = 1 / (1 + e<sup>-z</sup>), z = β₀ + β₁X</p>
        <div class="hc-form-group">
            <label for="hc-lr-b0">Sabit Katsayı (β₀ - Intercept)</label>
            <input type="number" id="hc-lr-b0" step="any" placeholder="Örn: -2.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-lr-b1">Eğim Katsayısı (β₁ - Slope)</label>
            <input type="number" id="hc-lr-b1" step="any" placeholder="Örn: 0.8">
        </div>
        <div class="hc-form-group">
            <label for="hc-lr-x">Bağımsız Değişken (X)</label>
            <input type="number" id="hc-lr-x" step="any" placeholder="Örn: 5">
        </div>
        <button class="hc-btn" onclick="hcLojistikRegHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-lojistik-regresyon-hesaplama-result">
            <span class="hc-label">Başarı Olasılığı P(Y=1):</span>
            <div class="hc-result-value" id="hc-lr-res-val">0</div>
            <div id="hc-lr-res-z" style="margin-top:10px; color:#666;"></div>
        </div>
    </div>
    <?php
}
