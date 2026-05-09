<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beton_blok_dolgu_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beton-blok-dolgu-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/beton-blok-dolgu-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beton-blok-dolgu-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/beton-blok-dolgu-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-beton-blok-dolgu-miktari-hesaplama">
        <h3>Beton Blok Dolgu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bbd-area">Duvar Alanı (m²)</label>
            <input type="number" id="hc-bbd-area" placeholder="Örn: 20" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bbd-size">Blok Ölçüsü</label>
            <select id="hc-bbd-size">
                <option value="0.01">20x20x40 cm (Standart)</option>
                <option value="0.007">15x20x40 cm</option>
                <option value="0.015">25x20x40 cm</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-bbd-fill">Doluluk Oranı (%)</label>
            <input type="number" id="hc-bbd-fill" placeholder="Örn: 100 (Tüm boşluklar)" value="100">
        </div>
        <button class="hc-btn" onclick="hcBBDHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bbd-result">
            <div class="hc-result-label">Gereken Dolgu Hacmi:</div>
            <div class="hc-result-value" id="hc-bbd-val">-</div>
            <div class="hc-result-note">Harç hacmi metreküp (m³) cinsinden hesaplanmıştır.</div>
        </div>
    </div>
    <?php
}
