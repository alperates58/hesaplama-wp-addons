<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ust_aykiri_deger_siniri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-upper-outlier',
        HC_PLUGIN_URL . 'modules/ust-aykiri-deger-siniri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-upper-outlier-css',
        HC_PLUGIN_URL . 'modules/ust-aykiri-deger-siniri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-upper-outlier">
        <h3>Üst Aykırı Değer Sınırı</h3>
        <div class="hc-form-group">
            <label for="hc-uo-q1">Birinci Çeyrek (Q1)</label>
            <input type="number" id="hc-uo-q1" value="25" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-uo-q3">Üçüncü Çeyrek (Q3)</label>
            <input type="number" id="hc-uo-q3" value="75" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcUpperOutlierHesapla()">Sınırı Hesapla</button>
        <div class="hc-result" id="hc-upper-outlier-result">
            <div class="hc-result-item">
                <span>IQR (Q3 - Q1):</span>
                <span id="hc-res-uo-iqr">0</span>
            </div>
            <div class="hc-result-item">
                <span>Üst Sınır (Fence):</span>
                <span class="hc-result-value" id="hc-res-uo-val">0</span>
            </div>
            <p class="hc-uo-note">Bu sınırın üzerindeki değerler "aykırı değer" olarak kabul edilir.</p>
        </div>
    </div>
    <?php
}
