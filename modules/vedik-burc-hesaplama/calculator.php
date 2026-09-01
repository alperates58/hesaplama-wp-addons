<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vedik_burc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-vedik',
        HC_PLUGIN_URL . 'modules/vedik-burc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-vedik-css',
        HC_PLUGIN_URL . 'modules/vedik-burc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-vedik">
        <div class="hc-header">
            <h3>Vedik (Hint / Jyotish) Burç ve Nakshatra Hesaplama</h3>
            <p class="hc-subtitle">Kadim Hint astrolojisiyle Sidereal Güneş Rasi'nizi, Ay Nakshatra'nızı (27 Ay Konağı), Pada'nızı ve Ruhsal Yaşam Amacınızı (Purushartha) keşfedin.</p>
        </div>

        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-vb-birthdate">Doğum Tarihi *</label>
                <input type="date" id="hc-vb-birthdate" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-vb-time">Doğum Saati (Opsiyonel)</label>
                <input type="time" id="hc-vb-time" value="12:00" class="hc-input">
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcVedikBurcHesapla()">🕉️ Vedik Rasi & Nakshatra'mı Hesapla</button>

        <div class="hc-result" id="hc-vb-result">
            <div class="hc-vb-hero" id="hc-vb-hero"></div>

            <div class="hc-vb-section">
                <h4 class="hc-vb-sec-title">🪷 Jyotish Kutsal Konumları & Nakshatra Detayları</h4>
                <div class="hc-vb-details-grid" id="hc-vb-details"></div>
            </div>

            <div class="hc-vb-section">
                <h4 class="hc-vb-sec-title">📖 Vedik Karma, Dharma ve Yaşam Amacı</h4>
                <div class="hc-result-content" id="hc-vb-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
