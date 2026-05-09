<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beton_blok_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beton-blok-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/beton-blok-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beton-blok-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/beton-blok-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-beton-blok-miktari-hesaplama">
        <h3>Beton Blok (Briket/Bims) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bbm-area">Duvar Alanı (m²)</label>
            <input type="number" id="hc-bbm-area" placeholder="Örn: 20" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bbm-size">Blok Yüzey Alanı (cm)</label>
            <select id="hc-bbm-size">
                <option value="800">20 x 40 cm (Standart)</option>
                <option value="600">15 x 40 cm</option>
                <option value="1000">25 x 40 cm</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-bbm-waste">Fire Payı (%)</label>
            <input type="number" id="hc-bbm-waste" placeholder="Örn: 5" value="5">
        </div>
        <button class="hc-btn" onclick="hcBBMHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bbm-result">
            <div class="hc-result-label">Gereken Blok Sayısı:</div>
            <div class="hc-result-value" id="hc-bbm-val">-</div>
            <div class="hc-result-note">Harç payı dahil yaklaşık değerdir.</div>
        </div>
    </div>
    <?php
}
