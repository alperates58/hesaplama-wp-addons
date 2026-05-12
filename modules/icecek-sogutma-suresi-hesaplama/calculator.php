<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_icecek_sogutma_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cooling-time-js',
        HC_PLUGIN_URL . 'modules/icecek-sogutma-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cooling-time-css',
        HC_PLUGIN_URL . 'modules/icecek-sogutma-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cooling-time">
        <h3>İçecek Soğutma Süresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ct-temp-start">Başlangıç Sıcaklığı (°C)</label>
            <input type="number" id="hc-ct-temp-start" value="25">
        </div>

        <div class="hc-form-group">
            <label for="hc-ct-temp-target">Hedef Sıcaklık (°C)</label>
            <input type="number" id="hc-ct-temp-target" value="4">
        </div>

        <div class="hc-form-group">
            <label for="hc-ct-method">Soğutma Yöntemi</label>
            <select id="hc-ct-method">
                <option value="0.015">Buzdolabı (4°C)</option>
                <option value="0.04">Derin Dondurucu (-18°C)</option>
                <option value="0.15">Buzlu Tuzlu Su (0°C)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSogutmaSuresiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-cooling-time-result">
            <div class="hc-result-item">
                <span>Tahmini Süre:</span>
                <strong class="hc-result-value" id="hc-ct-val">-</strong>
            </div>
            <div class="hc-result-note">Not: İçeceğin hacmi ve kabın (cam, metal, plastik) iletkenliği süreyi etkileyebilir.</div>
        </div>
    </div>
    <?php
}
