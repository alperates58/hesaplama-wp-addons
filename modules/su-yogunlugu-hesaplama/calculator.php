<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_yogunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-su-yogunlugu-hesaplama',
        HC_PLUGIN_URL . 'modules/su-yogunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-su-yogunlugu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/su-yogunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-su-yogunlugu-hesaplama">
        <div class="hc-cal-header">
            <h3>Su Yoğunluğu Hesaplama</h3>
            <p>Sıcaklığa (°C) ve tuzluluk oranına (ppt veya g/kg) bağlı olarak suyun yoğunluğunu (kg/m³ veya g/cm³) yüksek doğrulukta hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sy-temp">Su Sıcaklığı (°C)</label>
            <input type="number" id="hc-sy-temp" class="hc-input" value="20" step="any" min="-10" max="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-sy-sal">Tuzluluk Oranı (g/kg - ppt)</label>
            <input type="number" id="hc-sy-sal" class="hc-input" value="0" step="any" min="0" max="45">
            <span style="font-size: 11px; color: #777;">Tatlı su: 0, Ortalama deniz suyu: 35</span>
        </div>

        <button class="hc-btn" onclick="hcSuYoğunluguHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-su-yogunlugu-hesaplama-result">
            <div class="hc-result-title">Hesaplanan Su Yoğunluğu</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Yoğunluk (kg/m³):</span>
                <span class="hc-result-value" id="hc-sy-res-kgm3">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Yoğunluk (g/cm³):</span>
                <span class="hc-result-value" id="hc-sy-res-gcm3">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Özgül Ağırlık (1 atm):</span>
                <span class="hc-result-value" id="hc-sy-res-sg">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sy-desc"></div>
        </div>
    </div>
    <?php
}
