<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kader_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kader-num',
        HC_PLUGIN_URL . 'modules/kader-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kader-num-css',
        HC_PLUGIN_URL . 'modules/kader-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kader-sayisi-hesaplama">
        <div class="hc-header">
            <h3>Kader Sayısı Hesaplama (Yaşam Amacı & Kadersel Misyon)</h3>
            <p class="hc-subtitle">Adınızdaki harflerin titreşiminden kaderinizin ana misyonunu, gizli yeteneklerinizi ve kadersel sınavlarınızı öğrenin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-kader-name">Adınız ve Soyadınız (Kimlikte Yazan) *</label>
            <input type="text" id="hc-kader-name" placeholder="Örn: Burak Demir" class="hc-input" value="Burak Demir" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcKaderHesapla()">⭐ Kader Sayımı & Yaşam Misyonumu Hesapla</button>

        <div class="hc-result" id="hc-kader-result">
            <div class="hc-num-hero" id="hc-kader-hero"></div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">🏛️ Kadersel Yetenekler, Çakra & Yaşam Gücü</h4>
                <div class="hc-num-grid" id="hc-kader-grid"></div>
            </div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">📖 Detaylı Kadersel Misyon & Ruhsal Rehberlik</h4>
                <div class="hc-result-content" id="hc-kader-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
