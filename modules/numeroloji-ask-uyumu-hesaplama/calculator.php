<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_numeroloji_ask_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-numeroloji-ask-uyumu-hesaplama',
        HC_PLUGIN_URL . 'modules/numeroloji-ask-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-numeroloji-ask-uyumu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/numeroloji-ask-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-num-love">
        <div class="hc-header">
            <h3>Numeroloji Aşk Uyumu Hesaplama</h3>
            <p class="hc-subtitle">Partnerinizle doğum tarihlerinizin Pisagor Yaşam Yolu titreşiminden aşk uyumunuzu, tutku seviyenizi ve uzun vadeli evlilik potansiyelinizi test edin.</p>
        </div>

        <div class="hc-num-grid-dates">
            <div class="hc-num-col">
                <label for="hc-nl-birth-1">1. Kişi Doğum Tarihi *</label>
                <input type="date" id="hc-nl-birth-1" class="hc-input" value="1995-03-21" required>
            </div>
            <div class="hc-num-col">
                <label for="hc-nl-birth-2">2. Kişi Doğum Tarihi *</label>
                <input type="date" id="hc-nl-birth-2" class="hc-input" value="1997-07-14" required>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcNumerologyLoveHesapla()">💘 Aşk & Evlilik Uyumumuzu Hesapla</button>

        <div class="hc-result" id="hc-numeroloji-ask-uyumu-hesaplama-result">
            <div class="hc-num-hero" id="hc-nl-hero"></div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">📊 3 Boyutlu Aşk Dinamiği Çubukları</h4>
                <div class="hc-bars-wrapper" id="hc-nl-bars"></div>
            </div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">📖 Yaşam Yolları Sinerjisi & Romantik Gelecek</h4>
                <div class="hc-result-content" id="hc-res-nl-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
