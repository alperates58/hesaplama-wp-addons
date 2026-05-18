<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_simsek_mesafesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-simsek-mesafesi-hesaplama',
        HC_PLUGIN_URL . 'modules/simsek-mesafesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-simsek-mesafesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/simsek-mesafesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-simsek-mesafesi-hesaplama">
        <div class="hc-cal-header">
            <h3>Şimşek Mesafesi Hesaplama</h3>
            <p>Işık ve ses hızları arasındaki farktan yararlanarak, şimşek çakması ile gök gürültüsü arasındaki süreye göre yıldırımın ne kadar uzağa düştüğünü hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sm-time">Geçen Süre (Işık ile ses arasındaki saniye farkı)</label>
            <input type="number" id="hc-sm-time" class="hc-input" placeholder="örn. 5" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-sm-temp">Hava Sıcaklığı (°C)</label>
            <input type="number" id="hc-sm-temp" class="hc-input" value="20" step="any">
            <span style="font-size: 11px; color: #777;">Sıcaklık sesin havadaki yayılma hızını doğrudan etkiler.</span>
        </div>

        <button class="hc-btn" onclick="hcSimsekMesafesiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-simsek-mesafesi-hesaplama-result">
            <div class="hc-result-title">Yıldırım / Şimşek Mesafesi</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Mesafe (Metre):</span>
                <span class="hc-result-value" id="hc-sm-res-m">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Mesafe (Kilometre):</span>
                <span class="hc-result-value" id="hc-sm-res-km">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Havadaki Ses Hızı:</span>
                <span class="hc-result-value" id="hc-sm-res-v">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sm-desc"></div>
        </div>
    </div>
    <?php
}
