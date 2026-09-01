<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tarot_yil_karti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarot-year',
        HC_PLUGIN_URL . 'modules/tarot-yil-karti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tarot-year-css',
        HC_PLUGIN_URL . 'modules/tarot-yil-karti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tarot-year-calc">
        <div class="hc-header">
            <h3>Kişisel Yıl Tarot Kartı Hesaplama (Yıllık Dönüşüm Döngüsü)</h3>
            <p class="hc-subtitle">Doğum gününüz ve hedef yılın ezoterik toplamıyla o yıl boyunca size rehberlik edecek Büyük Arkana temasını ve 4 çeyrek projeksiyonunu öğrenin.</p>
        </div>

        <div class="hc-dual-row">
            <div class="hc-form-group">
                <label for="hc-tyc-date">Doğum Tarihiniz *</label>
                <input type="date" id="hc-tyc-date" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-tyc-year">Hesaplanacak Yıl *</label>
                <select id="hc-tyc-year" class="hc-input">
                    <option value="2025">2025</option>
                    <option value="2026" selected>2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                </select>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcTarotYilHesapla()">📅 Kişisel Yıl Kartımı & 4 Çeyrek Rehberimi Hesapla</button>

        <div class="hc-result" id="hc-tarot-yil-karti-result">
            <div class="hc-tarot-hero" id="hc-tyc-hero"></div>

            <div class="hc-tarot-section">
                <h4 class="hc-tarot-sec-title">🗓️ Yılın 4 Çeyrek Dönemsel Enerji Dalgaları</h4>
                <div class="hc-tarot-quarters-grid" id="hc-tyc-quarters"></div>
            </div>

            <div class="hc-tarot-section">
                <h4 class="hc-tarot-sec-title">📖 Yıllık Aşk, Kariyer & Ruhsal Dönüşüm Rehberi</h4>
                <div class="hc-result-content" id="hc-tyc-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
