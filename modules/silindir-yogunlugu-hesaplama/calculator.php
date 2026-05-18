<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_silindir_yogunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-silindir-yogunlugu-hesaplama',
        HC_PLUGIN_URL . 'modules/silindir-yogunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-silindir-yogunlugu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/silindir-yogunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-silindir-yogunlugu-hesaplama">
        <div class="hc-cal-header">
            <h3>Silindir Yoğunluğu Hesaplama</h3>
            <p>Bir silindirin geometrik ölçüleri (yarıçap ve yükseklik) ile kütlesini kullanarak hacmini ve özgül yoğunluğunu hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-siy-r">Yarıçap (r - santimetre - cm)</label>
            <input type="number" id="hc-siy-r" class="hc-input" placeholder="örn. 5" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-siy-h">Yükseklik (h - santimetre - cm)</label>
            <input type="number" id="hc-siy-h" class="hc-input" placeholder="örn. 20" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-siy-m">Kütle (Ağırlık - kilogram - kg)</label>
            <input type="number" id="hc-siy-m" class="hc-input" placeholder="örn. 3.5" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSilindirYoğunluguHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-silindir-yogunlugu-hesaplama-result">
            <div class="hc-result-title">Hesaplanan Hacim ve Yoğunluk</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Silindir Hacmi (cm³):</span>
                <span class="hc-result-value" id="hc-siy-res-v-cm3">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Silindir Hacmi (Litre - L):</span>
                <span class="hc-result-value" id="hc-siy-res-v-l">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Yoğunluk (g/cm³):</span>
                <span class="hc-result-value" id="hc-siy-res-rho-gcm3">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Yoğunluk (kg/m³):</span>
                <span class="hc-result-value" id="hc-siy-res-rho-kgm3">-</span>
            </div>
            <div class="hc-result-desc" id="hc-siy-desc"></div>
        </div>
    </div>
    <?php
}
