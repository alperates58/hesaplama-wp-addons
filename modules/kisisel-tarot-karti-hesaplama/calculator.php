<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisisel_tarot_karti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarot-daily',
        HC_PLUGIN_URL . 'modules/kisisel-tarot-karti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tarot-daily-css',
        HC_PLUGIN_URL . 'modules/kisisel-tarot-karti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tarot-daily-calc">
        <div class="hc-header">
            <h3>Günlük Kişisel Tarot & Günün Rehber Kartı</h3>
            <p class="hc-subtitle">Doğum tarihiniz ile bugünün kozmik takvimini sentezleyerek günün temasını, fırsatlarını ve olumlamasını öğrenin.</p>
        </div>

        <div class="hc-mode-toggle">
            <button type="button" class="hc-mode-btn active" id="hc-ktc-btn-daily" onclick="hcKtcSetMode('daily')">☀️ Günün Rehber Kartı</button>
            <button type="button" class="hc-mode-btn" id="hc-ktc-btn-spread" onclick="hcKtcSetMode('spread')">🃏 3 Kartlık Açılım (Geçmiş - Şimdi - Gelecek)</button>
        </div>

        <div class="hc-form-group">
            <label for="hc-ktc-date">Doğum Tarihiniz *</label>
            <input type="date" id="hc-ktc-date" value="1995-05-15" class="hc-input" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcKisiselTarotHesapla()">🔮 Kişisel Tarot Rehberliğimi Aç</button>

        <div class="hc-result" id="hc-kisisel-tarot-karti-result">
            <div class="hc-tarot-hero" id="hc-ktc-hero"></div>

            <div class="hc-tarot-section">
                <h4 class="hc-tarot-sec-title">🎴 Günün Kozmik Kartları & Mesajları</h4>
                <div class="hc-tarot-grid" id="hc-ktc-cards"></div>
            </div>

            <div class="hc-tarot-section">
                <h4 class="hc-tarot-sec-title">📖 Günün Olumlaması & Kozmik Tavsiyesi</h4>
                <div class="hc-result-content" id="hc-ktc-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
