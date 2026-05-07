<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yonetici_gezegen_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yon-planet',
        HC_PLUGIN_URL . 'modules/yonetici-gezegen-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yon-planet-css',
        HC_PLUGIN_URL . 'modules/yonetici-gezegen-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yonetici-gezegen-hesaplama">
        <h3>Yönetici Gezegen Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yon-date">Doğum Tarihi</label>
            <input type="date" id="hc-yon-date">
        </div>
        <div class="hc-form-group">
            <label for="hc-yon-time">Doğum Saati</label>
            <input type="time" id="hc-yon-time">
        </div>
        <div class="hc-form-group">
            <label for="hc-yon-city">Doğum Yeri</label>
            <select id="hc-yon-city">
                <option value="39.9,32.8">Ankara</option>
                <option value="41.0,29.0">İstanbul</option>
                <option value="38.4,27.1">İzmir</option>
                <option value="37.0,35.3">Adana</option>
                <option value="36.8,30.7">Antalya</option>
                <option value="40.2,29.0">Bursa</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcYoneticiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yonetici-result">
            <div class="hc-result-label" id="hc-yon-asc"></div>
            <div class="hc-result-value" id="hc-yon-val"></div>
            <div class="hc-result-desc" id="hc-yon-desc"></div>
        </div>
    </div>
    <?php
}
