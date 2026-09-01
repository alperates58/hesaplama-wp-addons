<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kiron_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kiron-uyum',
        HC_PLUGIN_URL . 'modules/kiron-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kiron-uyum-css',
        HC_PLUGIN_URL . 'modules/kiron-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kiron-uyum">
        <div class="hc-header">
            <h3>Kiron (Yaralı Şifacı) Burcu Uyumu Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihlerinizi girerek Kiron burçlarınızı otomatik tespit edin; ruhsal yaralar, şifa gücü, empati ve koşulsuz kabul uyumunuzu öğrenin.</p>
        </div>

        <div class="hc-ki-persons-grid">
            <div class="hc-ki-person-box">
                <div class="hc-ki-pbadge">👤 1. Kişi (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-ki-d1">Doğum Tarihi *</label>
                    <input type="date" id="hc-ki-d1" value="1995-05-15" class="hc-input" required>
                </div>
            </div>

            <div class="hc-ki-person-box">
                <div class="hc-ki-pbadge hc-badge-p2">❤️ 2. Kişi (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-ki-d2">Doğum Tarihi *</label>
                    <input type="date" id="hc-ki-d2" value="1996-09-20" class="hc-input" required>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcKironUyumHesapla()">🌿 Kiron ve Şifa Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-ki-result">
            <div class="hc-ki-hero" id="hc-ki-hero"></div>

            <div class="hc-ki-section">
                <h4 class="hc-ki-sec-title">📊 4 Ruhsal Şifa ve Empati Boyutu</h4>
                <div class="hc-ki-dim-grid" id="hc-ki-dim-grid"></div>
            </div>

            <div class="hc-ki-section">
                <h4 class="hc-ki-sec-title">📖 Kiron - Kiron Sinastri Analizi</h4>
                <div class="hc-result-content" id="hc-ki-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
