<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_atis_hareketi_maksimum_yukseklik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-atis-hareketi-maksimum-yukseklik-hesaplama',
        HC_PLUGIN_URL . 'modules/atis-hareketi-maksimum-yukseklik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-atis-hareketi-maksimum-yukseklik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/atis-hareketi-maksimum-yukseklik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-atis-hareketi-maksimum-yukseklik-hesaplama">
        <h3>Maksimum Yükseklik Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ah-h-v0">İlk Hız (v₀ - m/s)</label>
            <input type="number" id="hc-ah-h-v0" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ah-h-angle">Fırlatma Açısı (θ - Derece)</label>
            <input type="number" id="hc-ah-h-angle" placeholder="Örn: 45" step="any">
        </div>
        <button class="hc-btn" onclick="hcAHHHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ah-h-result">
            <div class="hc-result-label">Maksimum Yükseklik (h_max):</div>
            <div class="hc-result-value" id="hc-ah-h-val">-</div>
            <div class="hc-result-note">h = (v₀² * sin²θ) / 2g</div>
        </div>
    </div>
    <?php
}
