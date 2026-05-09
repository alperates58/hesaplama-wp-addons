<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yagmur_suyu_yonetimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rainwater-harvest',
        HC_PLUGIN_URL . 'modules/yagmur-suyu-yonetimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rainwater-harvest-css',
        HC_PLUGIN_URL . 'modules/yagmur-suyu-yonetimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rainwater-harvest">
        <h3>Yağmur Suyu Hasadı</h3>
        <div class="hc-form-group">
            <label for="hc-rw-area">Çatı Alanı [m²]</label>
            <input type="number" id="hc-rw-area" value="100" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-rw-rain">Yıllık Yağış Miktarı [mm]</label>
            <input type="number" id="hc-rw-rain" value="600" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-rw-coeff">Akış Katsayısı (Runoff)</label>
            <select id="hc-rw-coeff">
                <option value="0.9">Kiremit Çatı (0.9)</option>
                <option value="0.8">Beton Çatı (0.8)</option>
                <option value="0.5">Toprak/Çim (0.5)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcRainwaterHesapla()">Hasat Miktarını Hesapla</button>
        <div class="hc-result" id="hc-rainwater-harvest-result">
            <div class="hc-result-item">
                <span>Yıllık Toplanan Su:</span>
                <span class="hc-result-value" id="hc-res-rw-val">0 Litre</span>
            </div>
            <p class="hc-rw-note">Hacim = Alan * Yağış * Katsayı</p>
        </div>
    </div>
    <?php
}
