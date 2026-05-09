<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cig_noktasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cig-noktasi-hesaplama',
        HC_PLUGIN_URL . 'modules/cig-noktasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cig-noktasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cig-noktasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cig-noktasi-hesaplama">
        <h3>Çiğ Noktası Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cn-temp">Sıcaklık (°C)</label>
            <input type="number" id="hc-cn-temp" placeholder="Örn: 25" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cn-hum">Bağıl Nem (%)</label>
            <input type="number" id="hc-cn-hum" placeholder="Örn: 60" step="any">
        </div>
        <button class="hc-btn" onclick="hcCNHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cn-result">
            <div class="hc-result-label">Çiğ Noktası (Td):</div>
            <div class="hc-result-value" id="hc-cn-val">-</div>
            <div class="hc-result-note">Magnus-Tetens formülü kullanılmıştır.</div>
        </div>
    </div>
    <?php
}
