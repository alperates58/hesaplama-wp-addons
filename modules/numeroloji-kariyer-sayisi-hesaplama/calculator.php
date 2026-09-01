<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_numeroloji_kariyer_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-numeroloji-kariyer-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/numeroloji-kariyer-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-numeroloji-kariyer-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/numeroloji-kariyer-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-career-number">
        <div class="hc-header">
            <h3>Numeroloji Kariyer & Para Sayısı Hesaplama</h3>
            <p class="hc-subtitle">Adınız ve soyadınızın iş dünyasındaki titreşiminden ideal sektörlerinizi, liderlik tarzınızı ve finansal başarı kapılarınızı keşfedin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-cn-name">Adınız ve Soyadınız *</label>
            <input type="text" id="hc-cn-name" class="hc-input" placeholder="Örn: Serkan Arı" value="Serkan Arı" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcCareerNumberHesapla()">💼 Kariyer & Başarı Sayımı Analiz Et</button>

        <div class="hc-result" id="hc-numeroloji-kariyer-sayisi-hesaplama-result">
            <div class="hc-num-hero" id="hc-cn-hero"></div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">🏢 İdeal Sektörler, Liderlik Tarzı & Finansal Bereket</h4>
                <div class="hc-num-grid" id="hc-cn-grid"></div>
            </div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">📖 2026 İş Hayatı Stratejisi & Kariyer Tavsiyeleri</h4>
                <div class="hc-result-content" id="hc-res-cn-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
