<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bagil_nem_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bagil-nem-hesaplama',
        HC_PLUGIN_URL . 'modules/bagil-nem-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bagil-nem-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bagil-nem-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bagil-nem-hesaplama">
        <h3>Bağıl Nem Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bn-temp">Hava Sıcaklığı (°C)</label>
            <input type="number" id="hc-bn-temp" placeholder="Örn: 25" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bn-dew">Çiğ Noktası (°C)</label>
            <input type="number" id="hc-bn-dew" placeholder="Örn: 15" step="any">
        </div>
        <button class="hc-btn" onclick="hcBNHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bn-result">
            <div class="hc-result-label">Bağıl Nem:</div>
            <div class="hc-result-value" id="hc-bn-val">-</div>
            <div class="hc-result-note">Magnus-Tetens formülü kullanılmıştır.</div>
        </div>
    </div>
    <?php
}
