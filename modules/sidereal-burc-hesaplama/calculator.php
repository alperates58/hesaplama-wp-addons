<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sidereal_burc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-sidereal',
        HC_PLUGIN_URL . 'modules/sidereal-burc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-sidereal-css',
        HC_PLUGIN_URL . 'modules/sidereal-burc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-sidereal">
        <div class="hc-header">
            <h3>Sidereal (Yıldızıl) Burç Hesaplama & Lahiri Ayanamsa</h3>
            <p class="hc-subtitle">Gökyüzündeki gerçek astronomik takımyıldız konumlarını (Lahiri Ayanamsa ile yaklaşık 24° kayma) ve Batı (Tropikal) burcunuzla farkını keşfedin.</p>
        </div>

        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-sb-birthdate">Doğum Tarihi *</label>
                <input type="date" id="hc-sb-birthdate" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-sb-time">Doğum Saati (Opsiyonel)</label>
                <input type="time" id="hc-sb-time" value="12:00" class="hc-input">
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcSiderealBurcHesapla()">🌟 Yıldızıl (Sidereal) Burcumu Hesapla</button>

        <div class="hc-result" id="hc-sb-result">
            <div class="hc-sb-hero" id="hc-sb-hero"></div>

            <div class="hc-sb-section">
                <h4 class="hc-sb-sec-title">⚖️ Tropikal (Batı) vs. Sidereal (Yıldızıl) Karşılaştırması</h4>
                <div class="hc-sb-compare-grid" id="hc-sb-compare"></div>
            </div>

            <div class="hc-sb-section">
                <h4 class="hc-sb-sec-title">📖 Yıldızıl Astrolojinin Ruhsal ve Kadersel Anlamı</h4>
                <div class="hc-result-content" id="hc-sb-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
