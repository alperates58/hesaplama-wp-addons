<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_polar_filtre_isik_kaybi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-polar-filtre-isik-kaybi-hesaplama',
        HC_PLUGIN_URL . 'modules/polar-filtre-isik-kaybi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-polar-filtre-isik-kaybi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/polar-filtre-isik-kaybi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-polar-filtre-isik-kaybi-hesaplama">
        <h3>Polar Filtre Işık Kaybı Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-polar-filtre-type">Filtre Tipi</label>
            <select id="hc-polar-filtre-type" class="hc-select">
                <option value="linear">Linear Polarizer (60% ışık kaybı)</option>
                <option value="circular" selected>Circular Polarizer (25-33% ışık kaybı)</option>
                <option value="hd">HD Polarizer (15% ışık kaybı)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-polar-original-aperture">Orijinal Diyafram (f/stop)</label>
            <select id="hc-polar-original-aperture" class="hc-select">
                <option value="1.4">f/1.4</option>
                <option value="1.8">f/1.8</option>
                <option value="2.0">f/2.0</option>
                <option value="2.8" selected>f/2.8</option>
                <option value="4.0">f/4</option>
                <option value="5.6">f/5.6</option>
                <option value="8.0">f/8</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcPolarFiltreIsikKaybiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-polar-filtre-isik-kaybi-hesaplama-result">
            <div class="hc-result-item">
                <span>Filtre Işık Geçirme Oranı:</span>
                <strong id="hc-polar-transmission-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Işık Kaybı (dB):</span>
                <strong id="hc-polar-loss-db-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Işık Kaybı (Stops):</span>
                <strong id="hc-polar-loss-stops-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Eşdeğer Diyafram:</span>
                <strong id="hc-polar-equivalent-f-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
