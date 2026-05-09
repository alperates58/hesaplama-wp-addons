<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_haritasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-birth-chart',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-birth-chart-css',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dogum-haritasi-hesaplama">
        <h3>Doğum Haritası Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-chart-date">Doğum Tarihi</label>
            <input type="date" id="hc-chart-date">
        </div>
        <div class="hc-form-group">
            <label for="hc-chart-time">Doğum Saati</label>
            <input type="time" id="hc-chart-time">
        </div>
        <div class="hc-form-group">
            <label for="hc-chart-city">Doğum Yeri (Şehir)</label>
            <select id="hc-chart-city">
                <option value="39.9,32.8">Ankara</option>
                <option value="41.0,29.0">İstanbul</option>
                <option value="38.4,27.1">İzmir</option>
                <option value="37.0,35.3">Adana</option>
                <option value="36.8,30.7">Antalya</option>
                <option value="40.2,29.0">Bursa</option>
                <option value="37.8,32.4">Konya</option>
                <option value="41.3,36.3">Samsun</option>
                <option value="38.7,35.4">Kayseri</option>
                <option value="37.0,37.3">Gaziantep</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDogumHaritasiHesapla()">Haritayı Oluştur</button>
        <div class="hc-result" id="hc-chart-result">
            <div class="hc-chart-grid">
                <div class="hc-chart-main">
                    <h4>Gezegen Konumları</h4>
                    <div id="hc-planets-list"></div>
                </div>
                <div class="hc-chart-side">
                    <h4>Evler (Whole Sign)</h4>
                    <div id="hc-houses-list"></div>
                </div>
            </div>
            <div class="hc-chart-summary" id="hc-chart-summary"></div>
        </div>
    </div>
    <?php
}
