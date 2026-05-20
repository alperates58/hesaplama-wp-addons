<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_flas_mesafe_isik_siddeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-flas-mesafe-isik-siddeti-hesaplama',
        HC_PLUGIN_URL . 'modules/flas-mesafe-isik-siddeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-flas-mesafe-isik-siddeti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/flas-mesafe-isik-siddeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-flas-mesafe-isik-siddeti-hesaplama">
        <h3>Flaş Mesafe Işık Şiddeti Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-flash-gn">Flaş Rehber Numarası (GN)</label>
            <select id="hc-flash-gn" class="hc-select">
                <option value="20">GN 20 (küçük flaş)</option>
                <option value="30">GN 30</option>
                <option value="40">GN 40</option>
                <option value="50" selected>GN 50</option>
                <option value="60">GN 60</option>
                <option value="80">GN 80</option>
                <option value="100">GN 100</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-flash-iso">ISO Değeri</label>
            <select id="hc-flash-iso" class="hc-select">
                <option value="100" selected>ISO 100</option>
                <option value="200">ISO 200</option>
                <option value="400">ISO 400</option>
                <option value="800">ISO 800</option>
                <option value="1600">ISO 1600</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-flash-mode">Hesaplama Modu</label>
            <select id="hc-flash-mode" class="hc-select" onchange="hcFlasModuDegis()">
                <option value="distance" selected>Mesafe'den Diyafram Bul</option>
                <option value="aperture">Diyafram'dan Mesafe Bul</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-flash-distance-group">
            <label for="hc-flash-distance">Konu Mesafesi (metre)</label>
            <input type="number" id="hc-flash-distance" class="hc-input" placeholder="Örn: 5" value="5" min="0.5" step="0.5">
        </div>

        <div class="hc-form-group" id="hc-flash-aperture-group" style="display: none;">
            <label for="hc-flash-aperture">Diyafram (f/stop)</label>
            <select id="hc-flash-aperture" class="hc-select">
                <option value="1.4">f/1.4</option>
                <option value="2.0">f/2.0</option>
                <option value="2.8" selected>f/2.8</option>
                <option value="4.0">f/4</option>
                <option value="5.6">f/5.6</option>
                <option value="8.0">f/8</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcFlasMesafeIsikSiddietiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-flas-mesafe-isik-siddeti-hesaplama-result">
            <div class="hc-result-item">
                <span>Rehber Numarası (ISO 100):</span>
                <strong id="hc-flash-gn-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span id="hc-flash-result-label1">Gerekli Diyafram (f/):</span>
                <strong id="hc-flash-result-val1">-</strong>
            </div>
            <div class="hc-result-item">
                <span id="hc-flash-result-label2">Işık Şiddeti:</span>
                <strong id="hc-flash-result-val2">-</strong>
            </div>
        </div>
    </div>
    <?php
}
