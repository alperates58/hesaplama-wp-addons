<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_numeroloji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-num-full',
        HC_PLUGIN_URL . 'modules/numeroloji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-num-full-css',
        HC_PLUGIN_URL . 'modules/numeroloji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-numeroloji-hesaplama">
        <div class="hc-header">
            <h3>Tam Numeroloji Analizi (6 Çekirdek Kod & Yaşam Zirveleri)</h3>
            <p class="hc-subtitle">Adınız, soyadınız ve doğum tarihinizin sentezinden Yaşam Yolu, Kader, Ruh, Kişilik, Olgunluk ve 4 Yaşam Zirvenizi hesaplayın.</p>
        </div>

        <div class="hc-dual-row">
            <div class="hc-form-group">
                <label for="hc-full-name">Adınız ve Soyadınız *</label>
                <input type="text" id="hc-full-name" placeholder="Örn: Zeynep Kaya" class="hc-input" value="Zeynep Kaya" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-full-date">Doğum Tarihiniz *</label>
                <input type="date" id="hc-full-date" value="1996-08-20" class="hc-input" required>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcFullNumHesapla()">🔮 Tam Numeroloji Haritamı Çıkar</button>

        <div class="hc-result" id="hc-numeroloji-result">
            <div class="hc-num-hero" id="hc-fn-hero"></div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">🎴 6 Çekirdek Numeroloji Matrisi</h4>
                <div class="hc-num-grid-6" id="hc-fn-grid"></div>
            </div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">🏔️ 4 Yaşam Zirvesi (Pinnacles) & Yaş Evreleri</h4>
                <div class="hc-pinnacles-grid" id="hc-fn-pinnacles"></div>
            </div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">📖 Kadersel Yaşam Yolu & Ruhsal Rehberlik</h4>
                <div class="hc-result-content" id="hc-full-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
