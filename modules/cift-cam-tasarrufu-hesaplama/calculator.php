<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cift_cam_tasarrufu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-double-glazing',
        HC_PLUGIN_URL . 'modules/cift-cam-tasarrufu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-double-glazing-css',
        HC_PLUGIN_URL . 'modules/cift-cam-tasarrufu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-double-glazing">
        <h3>Çift Cam Tasarrufu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cg-bill">Aylık Ortalama Isınma Faturası (₺)</label>
            <input type="number" id="hc-cg-bill" placeholder="Örn: 2000" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-cg-area">Pencere Alanı (m²)</label>
            <input type="number" id="hc-cg-area" placeholder="Örn: 15" step="0.5">
            <small>Evinizdeki tüm pencerelerin toplam cam alanı.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-cg-type">Yeni Cam Tipi</label>
            <select id="hc-cg-type">
                <option value="0.50">Standart Çift Cam (%50 Kayıp Azalması)</option>
                <option value="0.75">Isıcam Sinerji/Konfor (%75 Kayıp Azalması)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcCiftCamHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-cg-result">
            <div class="hc-result-item">
                <span>Aylık Tahmini Tasarruf:</span>
                <span class="hc-result-value" id="hc-res-cg-monthly">-</span>
            </div>
            <div class="hc-result-item">
                <span>Yıllık Tahmini Tasarruf:</span>
                <span class="hc-result-value highlight" id="hc-res-cg-yearly">-</span>
            </div>
            <div class="hc-result-note">
                * Pencereler toplam ısı kaybının %20-%30'undan sorumludur. Hesaplama bu oran üzerinden yapılmıştır.
            </div>
        </div>
    </div>
    <?php
}
