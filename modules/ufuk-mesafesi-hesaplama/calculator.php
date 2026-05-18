<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ufuk_mesafesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ufuk-mesafesi-hesaplama',
        HC_PLUGIN_URL . 'modules/ufuk-mesafesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ufuk-mesafesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ufuk-mesafesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ufuk-mesafesi-hesaplama">
        <div class="hc-cal-header">
            <h3>Ufuk Mesafesi Hesaplama</h3>
            <p>Gözlem yüksekliğinize (deniz veya yer seviyesinden) bağlı olarak Dünya'nın eğriliğini ve atmosferik kırılma etkisini göz önüne alarak ufuk çizgisini kaç metre/kilometre ötede görebileceğinizi hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-ufk-h">Gözlemci Göz Yüksekliği (h - metre - m)</label>
            <input type="number" id="hc-ufk-h" class="hc-input" placeholder="örn. 1.8 (ortalama insan boyu)" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-ufk-refraction">Atmosferik Kırılma Etkisi</label>
            <select id="hc-ufk-refraction" class="hc-select">
                <option value="yes">Evet (Standart Atmosfer - Görsel Ufuk %8-10 artar)</option>
                <option value="no">Hayır (Sadece Geometrik Ufuk)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcUfukMesafesiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ufuk-mesafesi-hesaplama-result">
            <div class="hc-result-title">Ufuk Çizgisi Analizi</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Ufuk Çizgisi Mesafesi (Metre):</span>
                <span class="hc-result-value" id="hc-ufk-res-m">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Ufuk Çizgisi Mesafesi (Kilometre):</span>
                <span class="hc-result-value" id="hc-ufk-res-km">-</span>
            </div>
            <div class="hc-result-desc" id="hc-ufk-desc"></div>
        </div>
    </div>
    <?php
}
