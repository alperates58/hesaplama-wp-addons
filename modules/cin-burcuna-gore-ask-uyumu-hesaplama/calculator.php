<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_burcuna_gore_ask_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-love-uyum',
        HC_PLUGIN_URL . 'modules/cin-burcuna-gore-ask-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cin-love-uyum-css',
        HC_PLUGIN_URL . 'modules/cin-burcuna-gore-ask-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cin-love-uyum">
        <div class="hc-header">
            <h3>Çin Burcuna Göre Aşk Uyumu Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihlerinizi girerek Çin Zodyak hayvanlarınızı tespit edin; romantik çekim, sadakat, birlikte zenginleşme ve evlilik uyumunuzu öğrenin.</p>
        </div>

        <div class="hc-cla-persons-grid">
            <div class="hc-cla-person-box">
                <div class="hc-cla-pbadge">👤 1. Kişi (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-cluy-date1">Doğum Tarihi *</label>
                    <input type="date" id="hc-cluy-date1" value="1995-05-15" class="hc-input" required>
                </div>
            </div>

            <div class="hc-cla-person-box">
                <div class="hc-cla-pbadge hc-badge-p2">❤️ 2. Kişi (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-cluy-date2">Doğum Tarihi *</label>
                    <input type="date" id="hc-cluy-date2" value="1996-09-20" class="hc-input" required>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcCinAskUyumuHesapla()">💘 Çin Astrolojisi Aşk Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-cin-love-uyum-result">
            <div class="hc-cla-hero" id="hc-cla-hero"></div>

            <div class="hc-cla-section">
                <h4 class="hc-cla-sec-title">📊 4 Çin Astrolojisi Aşk Boyutu</h4>
                <div class="hc-cla-dim-grid" id="hc-cla-dim-grid"></div>
            </div>

            <div class="hc-cla-section">
                <h4 class="hc-cla-sec-title">📖 Detaylı Çin Zodyak Aşk Analizi</h4>
                <div class="hc-result-content" id="hc-cluy-content"></div>
            </div>
        </div>
    </div>
    <?php
}
