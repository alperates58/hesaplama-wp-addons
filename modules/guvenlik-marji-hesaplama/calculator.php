<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_guvenlik_marji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-safety-calc',
        HC_PLUGIN_URL . 'modules/guvenlik-marji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-safety-calc-css',
        HC_PLUGIN_URL . 'modules/guvenlik-marji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-safety">
        <h3>Güvenlik Marjı (Margin of Safety)</h3>
        <div class="hc-form-group">
            <label for="hc-sm-intrinsic">Hesaplanan İçsel Değer (Fair Value ₺)</label>
            <input type="number" id="hc-sm-intrinsic" placeholder="Örn: 150">
        </div>
        <div class="hc-form-group">
            <label for="hc-sm-price">Güncel Piyasa Fiyatı (₺)</label>
            <input type="number" id="hc-sm-price" placeholder="Örn: 100">
        </div>
        <button class="hc-btn" onclick="hcSafetyHesapla()">Marjı Hesapla</button>
        <div class="hc-result" id="hc-sm-result">
            <div class="hc-result-item">
                <span>Güvenlik Marjı Oranı:</span>
                <strong class="hc-result-value" id="hc-sm-res-total">-</strong>
            </div>
            <p id="hc-sm-comment" class="hc-small-text"></p>
        </div>
    </div>
    <?php
}
