<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fotograf_baski_boyutu_dpi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fotograf-baski-boyutu-dpi-hesaplama',
        HC_PLUGIN_URL . 'modules/fotograf-baski-boyutu-dpi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fotograf-baski-boyutu-dpi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/fotograf-baski-boyutu-dpi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fotograf-baski-boyutu-dpi-hesaplama">
        <h3>Fotoğraf Baskı Boyutu DPI Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-print-width">Görüntü Genişliği (pixel)</label>
            <input type="number" id="hc-print-width" class="hc-input" placeholder="Örn: 4000" value="4000" min="100" step="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-print-height">Görüntü Yüksekliği (pixel)</label>
            <input type="number" id="hc-print-height" class="hc-input" placeholder="Örn: 2667" value="2667" min="100" step="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-print-dpi">Hedef DPI Değeri</label>
            <select id="hc-print-dpi" class="hc-select">
                <option value="72">72 DPI (Web)</option>
                <option value="150">150 DPI (Başlıklı Baskı)</option>
                <option value="200">200 DPI (Orta Kalite)</option>
                <option value="300" selected>300 DPI (Fotoğraf Baskısı)</option>
                <option value="600">600 DPI (Yüksek Kalite)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcFotografBaskiBoyutuDpiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-fotograf-baski-boyutu-dpi-hesaplama-result">
            <div class="hc-result-item">
                <span>300 DPI Baskı Boyutu:</span>
                <strong id="hc-print-size-300-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Hedef DPI'da Baskı Boyutu:</span>
                <strong id="hc-print-size-target-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Maksimum Baskı Boyutu (100 DPI):</span>
                <strong id="hc-print-size-max-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tavsiye:</span>
                <strong id="hc-print-recommendation-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
