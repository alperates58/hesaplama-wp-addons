<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mars_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mars-uyum',
        HC_PLUGIN_URL . 'modules/mars-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mars-uyum-css',
        HC_PLUGIN_URL . 'modules/mars-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mars-uyum">
        <div class="hc-header">
            <h3>Mars Burcu Uyumu Hesaplama (Tutku ve Enerji Uyumu)</h3>
            <p class="hc-subtitle">Doğum tarihlerinizi girerek Mars burçlarınızı otomatik tespit edin; cinsel çekim, enerji seviyesi, hırs ve kriz yönetimi uyumunuzu öğrenin.</p>
        </div>

        <div class="hc-mu-persons-grid">
            <div class="hc-mu-person-box">
                <div class="hc-mu-pbadge">👤 1. Kişi (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-mu-d1">Doğum Tarihi *</label>
                    <input type="date" id="hc-mu-d1" value="1995-05-15" class="hc-input" required>
                </div>
            </div>

            <div class="hc-mu-person-box">
                <div class="hc-mu-pbadge hc-badge-p2">❤️ 2. Kişi (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-mu-d2">Doğum Tarihi *</label>
                    <input type="date" id="hc-mu-d2" value="1996-09-20" class="hc-input" required>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcMarsUyumHesapla()">🔥 Mars ve Tutku Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-mu-result">
            <div class="hc-mu-hero" id="hc-mu-hero"></div>

            <div class="hc-mu-section">
                <h4 class="hc-mu-sec-title">📊 4 Tutku ve Dinamizm Boyutu</h4>
                <div class="hc-mu-dim-grid" id="hc-mu-dim-grid"></div>
            </div>

            <div class="hc-mu-section">
                <h4 class="hc-mu-sec-title">📖 Mars - Mars Sinastri Analizi</h4>
                <div class="hc-result-content" id="hc-mu-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
