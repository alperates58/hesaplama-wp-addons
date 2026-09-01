<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-zodiac',
        HC_PLUGIN_URL . 'modules/cin-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cin-zodiac-css',
        HC_PLUGIN_URL . 'modules/cin-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cin-burcu-hesaplama">
        <div class="hc-header">
            <h3>Çin Burcu & Dört Sütun (BaZi) Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihiniz ve saatinizden Yıl Hayvanınızı, Ay & Saat Sütunlarınızı, Yin/Yang polaritenizi ve 5 Element dengenizi keşfedin.</p>
        </div>

        <div class="hc-dual-row">
            <div class="hc-form-group">
                <label for="hc-cin-date">Doğum Tarihiniz *</label>
                <input type="date" id="hc-cin-date" class="hc-input" value="1998-06-12" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-cin-time">Doğum Saatiniz (İsteğe Bağlı)</label>
                <input type="time" id="hc-cin-time" class="hc-input" value="14:30">
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcCinBurcuHesapla()">🐉 Çin Burcumu & BaZi Haritamı Çıkar</button>

        <div class="hc-result" id="hc-cin-result">
            <div class="hc-num-hero" id="hc-cin-hero"></div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">🏛️ Çin Astrolojisi BaZi Sütunları</h4>
                <div class="hc-bazi-grid" id="hc-cin-pillars"></div>
            </div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">🌊 5 Element (Wu Xing) & Yin-Yang Dengesi</h4>
                <div class="hc-elem-bars" id="hc-cin-elements"></div>
            </div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">📖 Karakter Analizi, Uyumlu Burçlar & Şans Rehberi</h4>
                <div class="hc-result-content" id="hc-cin-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
