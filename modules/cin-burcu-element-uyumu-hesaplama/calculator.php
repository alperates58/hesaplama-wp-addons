<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_burcu_element_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-element-uyum',
        HC_PLUGIN_URL . 'modules/cin-burcu-element-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cin-element-uyum-css',
        HC_PLUGIN_URL . 'modules/cin-burcu-element-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cin-element-uyum">
        <div class="hc-header">
            <h3>Çin Burcu Element (Wu Xing) Uyumu Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihlerinizi girerek Çin Astrolojisindeki 5 Elementinizi (Ahşap, Ateş, Toprak, Metal, Su) ve Sheng (Besleme) / Ke (Kontrol) döngüsel rezonansınızı öğrenin.</p>
        </div>

        <div class="hc-cbe-persons-grid">
            <div class="hc-cbe-person-box">
                <div class="hc-cbe-pbadge">👤 1. Kişi (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-ceu-date1">Doğum Tarihi *</label>
                    <input type="date" id="hc-ceu-date1" value="1995-05-15" class="hc-input" required>
                </div>
            </div>

            <div class="hc-cbe-person-box">
                <div class="hc-cbe-pbadge hc-badge-p2">❤️ 2. Kişi (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-ceu-date2">Doğum Tarihi *</label>
                    <input type="date" id="hc-ceu-date2" value="1996-09-20" class="hc-input" required>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcCinElementUyumuHesapla()">☯️ Beş Element Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-cin-element-uyum-result">
            <div class="hc-cbe-hero" id="hc-cbe-hero"></div>

            <div class="hc-cbe-section">
                <h4 class="hc-cbe-sec-title">📊 4 Wu Xing Elementel Simya Boyutu</h4>
                <div class="hc-cbe-dim-grid" id="hc-cbe-dim-grid"></div>
            </div>

            <div class="hc-cbe-section">
                <h4 class="hc-cbe-sec-title">📖 Detaylı Sheng & Ke Döngüsü Analizi</h4>
                <div class="hc-result-content" id="hc-ceu-content"></div>
            </div>
        </div>
    </div>
    <?php
}
