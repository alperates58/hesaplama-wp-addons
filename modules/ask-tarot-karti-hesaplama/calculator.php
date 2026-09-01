<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ask_tarot_karti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarot-love',
        HC_PLUGIN_URL . 'modules/ask-tarot-karti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tarot-love-css',
        HC_PLUGIN_URL . 'modules/ask-tarot-karti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tarot-love-calc">
        <div class="hc-header">
            <h3>Aşk & İlişki Tarot Kartı Hesaplama (Kompozit Sinerji)</h3>
            <p class="hc-subtitle">Partnerinizle doğum tarihlerinizin ezoterik toplamından ilişkinizin arketipsel Tarot kartını, çekim gücünü ve kadersel bağını öğrenin.</p>
        </div>

        <div class="hc-dual-row">
            <div class="hc-form-group">
                <label for="hc-atc-date1">1. Kişinin Doğum Tarihi *</label>
                <input type="date" id="hc-atc-date1" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-atc-date2">2. Kişinin Doğum Tarihi *</label>
                <input type="date" id="hc-atc-date2" value="1996-08-20" class="hc-input" required>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-atc-stage">İlişki Durumu (Enerji Odağı)</label>
            <select id="hc-atc-stage" class="hc-input">
                <option value="dating">Flört & Yeni Başlangıç</option>
                <option value="relationship" selected>Birliktelik / Sevgili</option>
                <option value="married">Nişanlı / Evli</option>
                <option value="karmic">Ayrılık / Kadersel Yüzleşme</option>
            </select>
        </div>

        <button type="button" class="hc-btn" onclick="hcAskTarotHesapla()">🔮 Aşk Tarot Kartlarımızı & Sinerjimizi Hesapla</button>

        <div class="hc-result" id="hc-ask-tarot-karti-result">
            <div class="hc-tarot-hero" id="hc-atc-hero"></div>

            <div class="hc-tarot-section">
                <h4 class="hc-tarot-sec-title">🎴 İlişki Üçgeni: Bireysel Arketipler & Ortak Aşk Kartı</h4>
                <div class="hc-tarot-cards-grid" id="hc-atc-cards"></div>
            </div>

            <div class="hc-tarot-section">
                <h4 class="hc-tarot-sec-title">📖 Kadersel Çekim, Işık & Gölge Dinamikleri</h4>
                <div class="hc-result-content" id="hc-atc-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
