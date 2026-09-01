<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isim_numerolojisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-isim-num',
        HC_PLUGIN_URL . 'modules/isim-numerolojisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-isim-num-css',
        HC_PLUGIN_URL . 'modules/isim-numerolojisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-isim-numerolojisi-hesaplama">
        <div class="hc-header">
            <h3>İsim Numerolojisi Hesaplama (Pisagor Şifresi)</h3>
            <p class="hc-subtitle">Adınız ve soyadınızdaki harflerin sayısal frekansından İfade Sayısı, Ruh Güdüsü, Kişilik Sayısı ve Karmik Derslerinizi keşfedin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-name-input">Adınız ve Soyadınız (Kimlikte Yazan) *</label>
            <input type="text" id="hc-name-input" placeholder="Örn: Ahmet Yılmaz" class="hc-input" value="Ahmet Yılmaz" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcNameNumHesapla()">🔢 İsmimin Numerolojik Kodlarını Çöz</button>

        <div class="hc-result" id="hc-isim-num-result">
            <div class="hc-num-hero" id="hc-name-hero"></div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">🎴 İsim Numerolojisi Çekirdek Matrisi</h4>
                <div class="hc-num-grid" id="hc-name-grid"></div>
            </div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">🔤 Harf Harf Sayısal Döküm & Karmik Dersler</h4>
                <div id="hc-name-letters-table"></div>
            </div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">📖 Detaylı Karakter, Ruh & Yaşam Analizi</h4>
                <div class="hc-result-content" id="hc-name-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
