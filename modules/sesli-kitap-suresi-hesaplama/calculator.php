<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sesli_kitap_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-audiobook-time',
        HC_PLUGIN_URL . 'modules/sesli-kitap-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-audiobook-time-css',
        HC_PLUGIN_URL . 'modules/sesli-kitap-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-audiobook-time">
        <h3>Sesli Kitap Süresi</h3>
        <div class="hc-form-group">
            <label for="hc-ab-pages">Sayfa Sayısı</label>
            <input type="number" id="hc-ab-pages" value="300" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ab-speed">Okuma Hızı</label>
            <select id="hc-ab-speed">
                <option value="1">Normal (1.0x)</option>
                <option value="1.25">Hızlı (1.25x)</option>
                <option value="1.5">Çok Hızlı (1.5x)</option>
                <option value="2">Maksimum (2.0x)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcAudiobookTimeHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-audiobook-time-result">
            <div class="hc-result-item">
                <span>Tahmini Dinleme Süresi:</span>
                <span class="hc-result-value" id="hc-res-ab-time">0 Saat</span>
            </div>
            <p class="hc-ab-info">Bir sayfa ortalama 250 kelime ve normal okuma hızı dakikada 150 kelime olarak baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
