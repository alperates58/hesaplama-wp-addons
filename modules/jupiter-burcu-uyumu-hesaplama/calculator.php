<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_jupiter_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-jupiter-uyum',
        HC_PLUGIN_URL . 'modules/jupiter-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-jupiter-uyum-css',
        HC_PLUGIN_URL . 'modules/jupiter-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-jupiter-uyum">
        <div class="hc-header">
            <h3>Jüpiter Burcu Uyumu Hesaplama (Şans ve Büyüme Uyumu)</h3>
            <p class="hc-subtitle">Doğum tarihlerinizi girerek Jüpiter burçlarınızı otomatik tespit edin; bolluk, vizyon, seyahat ve ortak büyüme potansiyelinizi öğrenin.</p>
        </div>

        <div class="hc-jup-persons-grid">
            <div class="hc-jup-person-box">
                <div class="hc-jup-pbadge">👤 1. Kişi (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-jup-d1">Doğum Tarihi *</label>
                    <input type="date" id="hc-jup-d1" value="1995-05-15" class="hc-input" required>
                </div>
            </div>

            <div class="hc-jup-person-box">
                <div class="hc-jup-pbadge hc-badge-p2">❤️ 2. Kişi (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-jup-d2">Doğum Tarihi *</label>
                    <input type="date" id="hc-jup-d2" value="1996-09-20" class="hc-input" required>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcJupiterUyumHesapla()">🍀 Jüpiter ve Şans Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-ju-result">
            <div class="hc-jup-hero" id="hc-jup-hero"></div>

            <div class="hc-jup-section">
                <h4 class="hc-jup-sec-title">📊 4 Bolluk ve Vizyon Boyutu</h4>
                <div class="hc-jup-dim-grid" id="hc-jup-dim-grid"></div>
            </div>

            <div class="hc-jup-section">
                <h4 class="hc-jup-sec-title">📖 Jüpiter - Jüpiter Sinastri Analizi</h4>
                <div class="hc-result-content" id="hc-ju-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
