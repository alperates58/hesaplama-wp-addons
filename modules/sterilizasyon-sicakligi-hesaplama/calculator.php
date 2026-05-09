<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sterilizasyon_sicakligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-steril-temp',
        HC_PLUGIN_URL . 'modules/sterilizasyon-sicakligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-steril-temp-css',
        HC_PLUGIN_URL . 'modules/sterilizasyon-sicakligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-steril-temp">
        <h3>Gereken Sterilizasyon Sıcaklığı</h3>
        <div class="hc-form-group">
            <label for="hc-stt-f0">Hedef F0 Değeri [Dakika]</label>
            <input type="number" id="hc-stt-f0" value="15">
        </div>
        <div class="hc-form-group">
            <label for="hc-stt-time">İşlem Süresi (t) [Dakika]</label>
            <input type="number" id="hc-stt-time" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-stt-z">z Değeri [°C]</label>
            <input type="number" id="hc-stt-z" value="10">
        </div>
        <button class="hc-btn" onclick="hcSterilTempHesapla()">Sıcaklığı Hesapla</button>
        <div class="hc-result" id="hc-steril-temp-result">
            <div class="hc-result-item">
                <span>Gereken Sıcaklık (T):</span>
                <span class="hc-result-value" id="hc-res-stt-val">0 °C</span>
            </div>
            <p class="hc-stt-note">T = 121.1 + z * log10(F0 / t)</p>
        </div>
    </div>
    <?php
}
