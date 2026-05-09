<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_okuma_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-reading-time',
        HC_PLUGIN_URL . 'modules/okuma-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-reading-time-css',
        HC_PLUGIN_URL . 'modules/okuma-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-reading-time">
        <h3>Okuma Süresi Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-read-pages">Sayfa Sayısı</label>
            <input type="number" id="hc-read-pages" value="200" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-read-speed">Okuma Hızınız</label>
            <select id="hc-read-speed">
                <option value="150">Yavaş (150 Kelime/dk)</option>
                <option value="250" selected>Normal (250 Kelime/dk)</option>
                <option value="400">Hızlı (400 Kelime/dk)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcReadingTimeHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-reading-time-result">
            <div class="hc-result-item">
                <span>Tahmini Süre:</span>
                <span class="hc-result-value" id="hc-res-read-time">0 dk</span>
            </div>
            <p class="hc-read-note">Hesaplama, bir sayfada ortalama 300 kelime olduğu varsayılarak yapılmıştır.</p>
        </div>
    </div>
    <?php
}
