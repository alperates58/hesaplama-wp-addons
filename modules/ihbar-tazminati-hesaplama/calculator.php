<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ihbar_tazminati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ihbar-tazminati',
        HC_PLUGIN_URL . 'modules/ihbar-tazminati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ihbar-tazminati-css',
        HC_PLUGIN_URL . 'modules/ihbar-tazminati-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ihbar-tazminati-hesaplama">
        <div class="hc-header">
            <h3>İhbar Tazminatı Hesaplama (4857 Sayılı İş Kanunu)</h3>
            <p class="hc-subtitle">Çalışma süreniz ve giydirilmiş brüt ücretiniz üzerinden yasal ihbar sürenizi, brüt/net tazminat tutarınızı ve yasal kesintileri hesaplayın.</p>
        </div>

        <div class="hc-dual-row">
            <div class="hc-form-group">
                <label for="hc-it-maas">Aylık Çıplak Brüt Maaş (₺) *</label>
                <input type="number" id="hc-it-maas" placeholder="Örn: 45000" min="0" class="hc-input" value="45000" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-it-ek">Aylık Düzenli Yan Haklar (Yol, Yemek, Prim ₺)</label>
                <input type="number" id="hc-it-ek" placeholder="Örn: 5000" min="0" class="hc-input" value="5000">
            </div>
        </div>

        <div class="hc-dual-row">
            <div class="hc-form-group">
                <label for="hc-it-yil">Çalışılan Yıl *</label>
                <input type="number" id="hc-it-yil" placeholder="Yıl" min="0" value="2" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-it-ay">Çalışılan Ay *</label>
                <input type="number" id="hc-it-ay" placeholder="Ay" min="0" max="11" value="4" class="hc-input" required>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcIhbarTazminatiHesapla()">⚖️ İhbar Tazminatımı Hesapla</button>

        <div class="hc-result" id="hc-it-result">
            <div class="hc-num-hero" id="hc-it-hero"></div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">📋 İhbar Süresi & Yasal Kesinti Dökümü</h4>
                <div class="hc-it-table-box" id="hc-it-table-box"></div>
            </div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">📖 İş Kanunu Madde 17 Hükümleri & İhbar Öneli Rehberi</h4>
                <div class="hc-result-content" id="hc-it-desc"></div>
            </div>
        </div>
    </div>
    <?php
}