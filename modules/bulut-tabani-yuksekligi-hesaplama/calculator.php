<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bulut_tabani_yuksekligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bulut-tabani-yuksekligi-hesaplama',
        HC_PLUGIN_URL . 'modules/bulut-tabani-yuksekligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bulut-tabani-yuksekligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bulut-tabani-yuksekligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bulut-tabani-yuksekligi-hesaplama">
        <h3>Bulut Tabanı Yüksekliği Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bty-temp">Yer Sıcaklığı (°C)</label>
            <input type="number" id="hc-bty-temp" placeholder="Örn: 25" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bty-dew">Çiğ Noktası (°C)</label>
            <input type="number" id="hc-bty-dew" placeholder="Örn: 15" step="any">
        </div>
        <button class="hc-btn" onclick="hcBTYHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bty-result">
            <div class="hc-result-label">Tahmini Bulut Tabanı Yüksekliği:</div>
            <div class="hc-result-value" id="hc-bty-val">-</div>
            <div class="hc-result-note">H = (Sıcaklık - Çiğ Noktası) * 125 (Metre)</div>
        </div>
    </div>
    <?php
}
