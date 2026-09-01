<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_on_uc_burc_sistemi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-on-uc-burc',
        HC_PLUGIN_URL . 'modules/on-uc-burc-sistemi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-on-uc-burc-css',
        HC_PLUGIN_URL . 'modules/on-uc-burc-sistemi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-on-uc-burc-hesaplama">
        <div class="hc-header">
            <h3>13 Burç Sistemi ve Yılan Burcu (Ophiuchus) Hesaplama</h3>
            <p class="hc-subtitle">NASA ve Uluslararası Astronomi Birliği (IAU) gökyüzü takımyıldız sınırlarına göre 13. burç olan Yılan Burcu dahil gerçek astronomik burcunuzu öğrenin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-13b-date">Doğum Tarihiniz *</label>
            <input type="date" id="hc-13b-date" value="1995-05-15" class="hc-input" required>
        </div>

        <button type="button" class="hc-btn" onclick="hc13BurcHesapla()">🐍 13 Burç Sistemindeki Burcumu Hesapla</button>

        <div class="hc-result" id="hc-on-uc-burc-result">
            <div class="hc-13b-hero" id="hc-13b-hero"></div>

            <div class="hc-13b-section">
                <h4 class="hc-13b-sec-title">⚖️ Klasik 12 Burç vs. Gerçek 13 Takımyıldız Karşılaştırması</h4>
                <div class="hc-13b-compare-grid" id="hc-13b-compare"></div>
            </div>

            <div class="hc-13b-section">
                <h4 class="hc-13b-sec-title">📖 13. Burç Yılan (Ophiuchus) ve Astronomik Gerçekler</h4>
                <div class="hc-result-content" id="hc-13b-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
