<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tarot_numeroloji_karti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarot-num',
        HC_PLUGIN_URL . 'modules/tarot-numeroloji-karti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tarot-num-css',
        HC_PLUGIN_URL . 'modules/tarot-numeroloji-karti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tarot-num-calc">
        <div class="hc-header">
            <h3>Tarot & Numeroloji Kartı Hesaplama (Pisagor Sentezi)</h3>
            <p class="hc-subtitle">Pisagor Hayat Yolu Sayınız ile 22 Büyük Arkana'nın ezoterik rezonansını birleştirerek kader kodlarınızı çözün.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-tnc-date">Doğum Tarihiniz *</label>
            <input type="date" id="hc-tnc-date" value="1995-05-15" class="hc-input" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcTarotNumHesapla()">🔢 Numeroloji & Tarot Kodumu Hesapla</button>

        <div class="hc-result" id="hc-tarot-numeroloji-karti-result">
            <div class="hc-tarot-hero" id="hc-tnc-hero"></div>

            <div class="hc-tarot-section">
                <h4 class="hc-tarot-sec-title">🎴 Hayat Yolu Sayısı & Büyük Arkana Rezonansı</h4>
                <div class="hc-tarot-grid" id="hc-tnc-cards"></div>
            </div>

            <div class="hc-tarot-section">
                <h4 class="hc-tarot-sec-title">📖 Sayısal Titreşim & Karmik Hayat Görevi</h4>
                <div class="hc-result-content" id="hc-tnc-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
