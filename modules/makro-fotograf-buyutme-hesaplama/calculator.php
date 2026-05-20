<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_makro_fotograf_buyutme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-makro-fotograf-buyutme-hesaplama',
        HC_PLUGIN_URL . 'modules/makro-fotograf-buyutme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-makro-fotograf-buyutme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/makro-fotograf-buyutme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-makro-fotograf-buyutme-hesaplama">
        <h3>Makro Fotoğraf Büyütme Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-macro-focal">Lens Odak Uzaklığı (mm)</label>
            <input type="number" id="hc-macro-focal" class="hc-input" placeholder="Örn: 100" value="100" min="1" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-macro-extension">Ekstension Tüpü Uzunluğu (mm) (isteğe bağlı)</label>
            <input type="number" id="hc-macro-extension" class="hc-input" placeholder="Örn: 25" value="0" min="0" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-macro-aperture">Lens f/stop Değeri</label>
            <select id="hc-macro-aperture" class="hc-select">
                <option value="1.4">f/1.4</option>
                <option value="1.8">f/1.8</option>
                <option value="2.0">f/2.0</option>
                <option value="2.8">f/2.8</option>
                <option value="4.0">f/4</option>
                <option value="5.6" selected>f/5.6</option>
                <option value="8.0">f/8</option>
                <option value="11.0">f/11</option>
                <option value="16.0">f/16</option>
                <option value="22.0">f/22</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-macro-sensor">Sensör Tipi</label>
            <select id="hc-macro-sensor" class="hc-select">
                <option value="1.0" selected>Full Frame (36 x 24 mm)</option>
                <option value="1.6">APS-C Canon (1.6x crop)</option>
                <option value="1.5">APS-C Nikon/Sony (1.5x crop)</option>
                <option value="2.0">Micro Four Thirds (2.0x crop)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcMakroFotografBuyutmeHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-makro-fotograf-buyutme-hesaplama-result">
            <div class="hc-result-item">
                <span>Büyütme Oranı (Magnification):</span>
                <strong id="hc-macro-magnification-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Etkili f/stop (Effective f/):</span>
                <strong id="hc-macro-effective-f-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Işık Kaybı (Stops):</span>
                <strong id="hc-macro-light-loss-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Çerçevede Görüntü Boyutu:</span>
                <strong id="hc-macro-frame-size-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
