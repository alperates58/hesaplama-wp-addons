<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uzunluk_buzulmesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uzunluk-buzulmesi-hesaplama',
        HC_PLUGIN_URL . 'modules/uzunluk-buzulmesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-uzunluk-buzulmesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/uzunluk-buzulmesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-uzunluk-buzulmesi-hesaplama">
        <div class="hc-cal-header">
            <h3>Uzunluk Büzülmesi (Lorentz Kısaltması) Hesaplama</h3>
            <p>Albert Einstein'ın Özel Görelilik Kuramı doğrultusunda, ışık hızına yakın hızlarda hareket eden bir cismin boyunun durgun gözlemciye göre nasıl kısaldığını hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-uzb-l0">Durgun Boy / Öz Uzunluk (L₀ - metre - m)</label>
            <input type="number" id="hc-uzb-l0" class="hc-input" placeholder="örn. 100" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-uzb-v-type">Hız Birimi</label>
            <select id="hc-uzb-v-type" class="hc-select" onchange="hcUzunlukBuzulmesiHizTipiDegisti()">
                <option value="c">Işık Hızı Yüzdesi (%c)</option>
                <option value="ms">Metre / Saniye (m/s)</option>
                <option value="kmh">Kilometre / Saat (km/sa)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-uzb-v">Hız Değeri (v)</label>
            <input type="number" id="hc-uzb-v" class="hc-input" value="90" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcUzunlukBuzulmesiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-uzunluk-buzulmesi-hesaplama-result">
            <div class="hc-result-title">Görelilik Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Gözlenen Kısaltılmış Boy (L):</span>
                <span class="hc-result-value" id="hc-uzb-res-l">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Büzülme Miktarı (ΔL):</span>
                <span class="hc-result-value" id="hc-uzb-res-dl">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Lorentz Faktörü (γ - Gama):</span>
                <span class="hc-result-value" id="hc-uzb-res-gamma">-</span>
            </div>
            <div class="hc-result-desc" id="hc-uzb-desc"></div>
        </div>
    </div>
    <?php
}
