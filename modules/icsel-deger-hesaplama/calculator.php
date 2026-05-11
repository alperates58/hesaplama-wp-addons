<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_icsel_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-intrinsic-calc',
        HC_PLUGIN_URL . 'modules/icsel-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-intrinsic-calc-css',
        HC_PLUGIN_URL . 'modules/icsel-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-intrinsic">
        <h3>İçsel Değer (Graham Formülü)</h3>
        <div class="hc-form-group">
            <label for="hc-iv-eps">Hisse Başı Kar (EPS ₺)</label>
            <input type="number" id="hc-iv-eps" placeholder="Örn: 12.50" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-iv-growth">Beklenen Büyüme Oranı (7-10 Yıl, %)</label>
            <input type="number" id="hc-iv-growth" placeholder="Örn: 15">
        </div>
        <div class="hc-form-group">
            <label for="hc-iv-bond">AAA Tahvil Getirisi / Risksiz Faiz (%)</label>
            <input type="number" id="hc-iv-bond" placeholder="Örn: 45">
        </div>
        <button class="hc-btn" onclick="hcIntrinsicHesapla()">İçsel Değeri Hesapla</button>
        <div class="hc-result" id="hc-iv-result">
            <div class="hc-result-item">
                <span>Hesaplanan İçsel Değer:</span>
                <strong class="hc-result-value" id="hc-iv-res-total">-</strong>
            </div>
            <p class="hc-small-text">Graham formülü: V = EPS * (8.5 + 2g) * 4.4 / Y</p>
        </div>
    </div>
    <?php
}
