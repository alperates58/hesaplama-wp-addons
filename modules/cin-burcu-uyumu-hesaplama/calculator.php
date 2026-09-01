<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-burcu-uyumu',
        HC_PLUGIN_URL . 'modules/cin-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cin-burcu-uyumu-css',
        HC_PLUGIN_URL . 'modules/cin-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cin-burcu-uyumu">
        <div class="hc-header">
            <h3>Çin Burcu ve Element Uyumu Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihlerinizi girerek Çin Burcunuzu (12 Hayvan), Elementinizi (Ahşap, Ateş, Toprak, Metal, Su) ve San He / Liu He kadersel uyumunuzu öğrenin.</p>
        </div>

        <div class="hc-cz-persons-grid">
            <div class="hc-cz-person-box">
                <div class="hc-cz-pbadge">👤 1. Kişi (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-c1-date">Doğum Tarihi *</label>
                    <input type="date" id="hc-c1-date" value="1995-05-15" class="hc-input" required>
                </div>
            </div>

            <div class="hc-cz-person-box">
                <div class="hc-cz-pbadge hc-badge-p2">❤️ 2. Kişi (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-c2-date">Doğum Tarihi *</label>
                    <input type="date" id="hc-c2-date" value="1996-09-20" class="hc-input" required>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcCinBurcuUyumuHesapla()">🐉 Çin Astrolojisi Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-cin-burcu-uyumu-result">
            <div class="hc-cz-hero" id="hc-cz-hero"></div>

            <div class="hc-cz-section">
                <h4 class="hc-cz-sec-title">📊 4 Çin Astrolojisi Uyum Boyutu</h4>
                <div class="hc-cz-dim-grid" id="hc-cz-dim-grid"></div>
            </div>

            <div class="hc-cz-section">
                <h4 class="hc-cz-sec-title">📖 Detaylı San He (Üçlü Uyum) ve Element Analizi</h4>
                <div class="hc-cin-details" id="hc-cin-details"></div>
            </div>
        </div>
    </div>
    <?php
}
