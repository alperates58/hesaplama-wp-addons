<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fotograf_cozunurluk_baski_kalitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fotograf-cozunurluk-baski-kalitesi-hesaplama',
        HC_PLUGIN_URL . 'modules/fotograf-cozunurluk-baski-kalitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fotograf-cozunurluk-baski-kalitesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/fotograf-cozunurluk-baski-kalitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fotograf-cozunurluk-baski-kalitesi-hesaplama">
        <h3>Fotoğraf Çözünürlük Baskı Kalitesi Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-quality-width">Görüntü Genişliği (pixel)</label>
            <input type="number" id="hc-quality-width" class="hc-input" placeholder="Örn: 5000" value="5000" min="100" step="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-quality-height">Görüntü Yüksekliği (pixel)</label>
            <input type="number" id="hc-quality-height" class="hc-input" placeholder="Örn: 3333" value="3333" min="100" step="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-quality-viewing-distance">Izleme Mesafesi (cm)</label>
            <select id="hc-quality-viewing-distance" class="hc-select">
                <option value="30">30 cm (el içinde)</option>
                <option value="60" selected>60 cm (normal)</option>
                <option value="100">100 cm (duvar)</option>
                <option value="200">200 cm (uzaktan)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcFotografCozunurlukBaskiKalitesiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-fotograf-cozunurluk-baski-kalitesi-hesaplama-result">
            <div class="hc-result-item">
                <span>Megapiksel:</span>
                <strong id="hc-quality-mp-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>300 DPI Baskı (kaliteli):</span>
                <strong id="hc-quality-300dpi-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tavsiye Edilen Baskı:</span>
                <strong id="hc-quality-recommended-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Ppi (inç başına piksel):</span>
                <strong id="hc-quality-ppi-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
