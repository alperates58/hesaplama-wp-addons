<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tarot_ruh_karti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarot-soul',
        HC_PLUGIN_URL . 'modules/tarot-ruh-karti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tarot-soul-css',
        HC_PLUGIN_URL . 'modules/tarot-ruh-karti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tarot-soul-calc">
        <div class="hc-header">
            <h3>Tarot Ruh Kartı Hesaplama (Karmik Tekamül & İçsel Frekans)</h3>
            <p class="hc-subtitle">Ruhunuzun bu hayattaki en derin motivasyonunu, karmik amacını ve yüksek benlik frekansını keşfedin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-trc-date">Doğum Tarihiniz *</label>
            <input type="date" id="hc-trc-date" value="1995-05-15" class="hc-input" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcTarotRuhHesapla()">🕊️ Ruh Kartımı & Karmik Amacımı Hesapla</button>

        <div class="hc-result" id="hc-tarot-ruh-karti-result">
            <div class="hc-tarot-hero" id="hc-trc-hero"></div>

            <div class="hc-tarot-section">
                <h4 class="hc-tarot-sec-title">🎴 Ruh Arketipi, Meditasyon Odağı & Karmik Frekans</h4>
                <div class="hc-tarot-grid" id="hc-trc-cards"></div>
            </div>

            <div class="hc-tarot-section">
                <h4 class="hc-tarot-sec-title">📖 Yüksek Benlik Rehberliği & Tekamül Sınavı</h4>
                <div class="hc-result-content" id="hc-trc-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
