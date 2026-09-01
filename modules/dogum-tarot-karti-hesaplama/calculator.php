<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_tarot_karti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarot-birth',
        HC_PLUGIN_URL . 'modules/dogum-tarot-karti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tarot-birth-css',
        HC_PLUGIN_URL . 'modules/dogum-tarot-karti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tarot-birth-calc">
        <div class="hc-header">
            <h3>Doğum Tarot Kartı Hesaplama (Kişilik & Ruh Arketipi)</h3>
            <p class="hc-subtitle">Doğum tarihinizin numerolojik şifresinden ömür boyu size rehberlik eden Büyük Arkana Kişilik ve Ruh Kartınızı öğrenin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-tbc-date">Doğum Tarihiniz *</label>
            <input type="date" id="hc-tbc-date" value="1995-05-15" class="hc-input" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcDogumTarotHesapla()">✨ Doğum Tarot Kartlarımı & Hayat Yolumu Hesapla</button>

        <div class="hc-result" id="hc-dogum-tarot-karti-result">
            <div class="hc-tarot-hero" id="hc-tbc-hero"></div>

            <div class="hc-tarot-section">
                <h4 class="hc-tarot-sec-title">🎴 Arketipsel İkili: Kişilik Kartı & Ruh Kartı</h4>
                <div class="hc-tarot-cards-grid" id="hc-tbc-cards"></div>
            </div>

            <div class="hc-tarot-section">
                <h4 class="hc-tarot-sec-title">📖 Yaşam Amacı, Kadersel Yetenekler & Gölge Sınavlar</h4>
                <div class="hc-result-content" id="hc-tbc-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
