<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lilit_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lilit-uyum',
        HC_PLUGIN_URL . 'modules/lilit-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lilit-uyum-css',
        HC_PLUGIN_URL . 'modules/lilit-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lilit-uyum">
        <div class="hc-header">
            <h3>Lilit (Kara Ay) Burcu Uyumu Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihlerinizi girerek Kara Ay Lilit burçlarınızı otomatik tespit edin; manyetik çekim, bastırılmış arzular, tabular ve bağımsızlık uyumunuzu öğrenin.</p>
        </div>

        <div class="hc-lil-persons-grid">
            <div class="hc-lil-person-box">
                <div class="hc-lil-pbadge">👤 1. Kişi (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-lil-d1">Doğum Tarihi *</label>
                    <input type="date" id="hc-lil-d1" value="1995-05-15" class="hc-input" required>
                </div>
            </div>

            <div class="hc-lil-person-box">
                <div class="hc-lil-pbadge hc-badge-p2">❤️ 2. Kişi (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-lil-d2">Doğum Tarihi *</label>
                    <input type="date" id="hc-lil-d2" value="1996-09-20" class="hc-input" required>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcLilitUyumHesapla()">🔮 Lilit ve Manyetik Tutku Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-lu-result">
            <div class="hc-lil-hero" id="hc-lil-hero"></div>

            <div class="hc-lil-section">
                <h4 class="hc-lil-sec-title">📊 4 Derin Tutku ve Manyetizma Boyutu</h4>
                <div class="hc-lil-dim-grid" id="hc-lil-dim-grid"></div>
            </div>

            <div class="hc-lil-section">
                <h4 class="hc-lil-sec-title">📖 Lilit - Lilit Sinastri Analizi</h4>
                <div class="hc-result-content" id="hc-lu-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
