<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_asfalt_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-asfalt-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/asfalt-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-asfalt-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/asfalt-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-asfalt-miktari-hesaplama">
        <h3>Asfalt Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-asf-length">Yol Uzunluğu (m)</label>
            <input type="number" id="hc-asf-length" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label for="hc-asf-width">Yol Genişliği (m)</label>
            <input type="number" id="hc-asf-width" placeholder="Örn: 5">
        </div>
        <div class="hc-form-group">
            <label for="hc-asf-depth">Asfalt Kalınlığı (cm)</label>
            <input type="number" id="hc-asf-depth" placeholder="Örn: 5" value="5">
        </div>
        <button class="hc-btn" onclick="hcAsfaltHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-asf-result">
            <div class="hc-result-label">Gereken Asfalt:</div>
            <div class="hc-result-value" id="hc-asf-val">-</div>
            <div class="hc-result-note">Ortalama yoğunluk 2.35 t/m³ baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
