<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_venus_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-venus-uyum',
        HC_PLUGIN_URL . 'modules/venus-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-venus-uyum-css',
        HC_PLUGIN_URL . 'modules/venus-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-venus-uyum">
        <div class="hc-header">
            <h3>Venüs Burcu Uyumu Hesaplama (Aşk ve Romantizm Dili)</h3>
            <p class="hc-subtitle">Doğum tarihlerinizi girerek Venüs burçlarınızı otomatik tespit edin veya doğrudan seçerek aşk dili ve romantik sinerjinizi öğrenin.</p>
        </div>

        <div class="hc-vu-persons-grid">
            <div class="hc-vu-person-box">
                <div class="hc-vu-pbadge">👤 1. Kişi (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-vu-d1">Doğum Tarihi *</label>
                    <input type="date" id="hc-vu-d1" value="1995-05-15" class="hc-input" required>
                </div>
            </div>

            <div class="hc-vu-person-box">
                <div class="hc-vu-pbadge hc-badge-p2">❤️ 2. Kişi (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-vu-d2">Doğum Tarihi *</label>
                    <input type="date" id="hc-vu-d2" value="1996-09-20" class="hc-input" required>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcVenusUyumHesapla()">💖 Venüs ve Romantizm Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-vu-result">
            <div class="hc-vu-hero" id="hc-vu-hero"></div>

            <div class="hc-vu-section">
                <h4 class="hc-vu-sec-title">📊 4 Aşk ve Sevgi Dili Boyutu</h4>
                <div class="hc-vu-dim-grid" id="hc-vu-dim-grid"></div>
            </div>

            <div class="hc-vu-section">
                <h4 class="hc-vu-sec-title">📖 Venüs - Venüs Sinastri Analizi</h4>
                <div class="hc-result-content" id="hc-vu-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
