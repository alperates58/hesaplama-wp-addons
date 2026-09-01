<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_merkur_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-merkur-uyum',
        HC_PLUGIN_URL . 'modules/merkur-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-merkur-uyum-css',
        HC_PLUGIN_URL . 'modules/merkur-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-merkur-uyum">
        <div class="hc-header">
            <h3>Merkür Burcu Uyumu Hesaplama (İletişim ve Zihinsel Uyum)</h3>
            <p class="hc-subtitle">Doğum tarihlerinizi girerek Merkür burçlarınızı otomatik tespit edin; düşünce yapısı, zihinsel rezonans ve iletişim uyumunuzu öğrenin.</p>
        </div>

        <div class="hc-mer-persons-grid">
            <div class="hc-mer-person-box">
                <div class="hc-mer-pbadge">👤 1. Kişi (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-mer-d1">Doğum Tarihi *</label>
                    <input type="date" id="hc-mer-d1" value="1995-05-15" class="hc-input" required>
                </div>
            </div>

            <div class="hc-mer-person-box">
                <div class="hc-mer-pbadge hc-badge-p2">❤️ 2. Kişi (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-mer-d2">Doğum Tarihi *</label>
                    <input type="date" id="hc-mer-d2" value="1996-09-20" class="hc-input" required>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcMerkurUyumHesapla()">🗣️ Merkür ve İletişim Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-mu-result">
            <div class="hc-mer-hero" id="hc-mer-hero"></div>

            <div class="hc-mer-section">
                <h4 class="hc-mer-sec-title">📊 4 İletişim ve Zihinsel Uyum Boyutu</h4>
                <div class="hc-mer-dim-grid" id="hc-mer-dim-grid"></div>
            </div>

            <div class="hc-mer-section">
                <h4 class="hc-mer-sec-title">📖 Merkür - Merkür Sinastri Analizi</h4>
                <div class="hc-result-content" id="hc-mu-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
