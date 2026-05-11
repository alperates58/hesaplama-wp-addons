<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bugunku_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bugunku-deger',
        HC_PLUGIN_URL . 'modules/bugunku-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bugunku-deger-css',
        HC_PLUGIN_URL . 'modules/bugunku-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pv-calc">
        <h3>Bugünkü Değer (PV) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pv-fv">Gelecekteki Tutar (₺)</label>
            <input type="number" id="hc-pv-fv" placeholder="Örn: 250.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-pv-rate">Yıllık İskonto Oranı (%)</label>
            <input type="number" id="hc-pv-rate" placeholder="Örn: 35">
        </div>
        <div class="hc-form-group">
            <label for="hc-pv-years">Vade (Yıl)</label>
            <input type="number" id="hc-pv-years" placeholder="Örn: 3">
        </div>
        <button class="hc-btn" onclick="hcBugunkuDegerHesapla()">PV Hesapla</button>
        <div class="hc-result" id="hc-pv-result">
            <div class="hc-result-item">
                <span>Bugünkü Değer:</span>
                <strong class="hc-result-value" id="hc-pv-res-total">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Zaman Maliyeti (İskonto):</span>
                <strong id="hc-pv-res-discount">-</strong>
            </div>
        </div>
    </div>
    <?php
}
