<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sterilizasyon_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-steril-time',
        HC_PLUGIN_URL . 'modules/sterilizasyon-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-steril-time-css',
        HC_PLUGIN_URL . 'modules/sterilizasyon-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-steril-time">
        <h3>F0 Değeri (Sterilizasyon)</h3>
        <div class="hc-form-group">
            <label for="hc-st-temp">Süreç Sıcaklığı (T) [°C]</label>
            <input type="number" id="hc-st-temp" value="121.1" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-st-time">Süre (t) [Dakika]</label>
            <input type="number" id="hc-st-time" value="15">
        </div>
        <div class="hc-form-group">
            <label for="hc-st-z">z Değeri [°C]</label>
            <input type="number" id="hc-st-z" value="10">
            <small>Genelde Clostridium botulinum için 10°C alınır.</small>
        </div>
        <button class="hc-btn" onclick="hcSterilTimeHesapla()">F0 Hesapla</button>
        <div class="hc-result" id="hc-steril-time-result">
            <div class="hc-result-item">
                <span>Eşdeğer Süre (F0):</span>
                <span class="hc-result-value" id="hc-res-st-val">0 dakika</span>
            </div>
            <p class="hc-st-note">F0 = t * 10^((T - 121.1) / z)</p>
        </div>
    </div>
    <?php
}
