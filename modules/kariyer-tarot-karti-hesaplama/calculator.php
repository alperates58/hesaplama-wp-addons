<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kariyer_tarot_karti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarot-career',
        HC_PLUGIN_URL . 'modules/kariyer-tarot-karti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tarot-career-css',
        HC_PLUGIN_URL . 'modules/kariyer-tarot-karti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tarot-career-calc">
        <div class="hc-header">
            <h3>Kariyer & Para Tarot Kartı Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihinizin numerolojik arketipiyle mesleki süper gücünüzü, liderlik tarzınızı ve finansal bereket kapınızı öğrenin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-ctc-date">Doğum Tarihiniz *</label>
            <input type="date" id="hc-ctc-date" value="1995-05-15" class="hc-input" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcKariyerTarotHesapla()">💼 Kariyer & Bolluk Kartımı Hesapla</button>

        <div class="hc-result" id="hc-kariyer-tarot-karti-result">
            <div class="hc-tarot-hero" id="hc-ctc-hero"></div>

            <div class="hc-tarot-section">
                <h4 class="hc-tarot-sec-title">🏛️ Mesleki Arketip, Liderlik & Para Kapısı</h4>
                <div class="hc-tarot-grid" id="hc-ctc-cards"></div>
            </div>

            <div class="hc-tarot-section">
                <h4 class="hc-tarot-sec-title">📖 İdeal Sektörler & 2026 Kariyer Projeksiyonu</h4>
                <div class="hc-result-content" id="hc-ctc-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
