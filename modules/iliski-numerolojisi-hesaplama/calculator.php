<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iliski_numerolojisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-iliski-numerolojisi',
        HC_PLUGIN_URL . 'modules/iliski-numerolojisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-iliski-numerolojisi-css',
        HC_PLUGIN_URL . 'modules/iliski-numerolojisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-iliski-numerolojisi">
        <div class="hc-header">
            <h3>İlişki Numerolojisi & Çift Uyumu Hesaplama</h3>
            <p class="hc-subtitle">Partnerinizle adlarınız ve doğum tarihlerinizin ezoterik titreşiminden ortak İlişki Sayınızı, aşk kimyanızı ve kadersel bağınızı hesaplayın.</p>
        </div>

        <div class="hc-partner-grid">
            <div class="hc-partner-card">
                <h4>👤 1. Partner</h4>
                <div class="hc-form-group">
                    <label for="hc-num-n1">Ad Soyad *</label>
                    <input type="text" id="hc-num-n1" class="hc-input" placeholder="Adınız Soyadınız" value="Kerem Aktürk" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-num-d1">Doğum Tarihi *</label>
                    <input type="date" id="hc-num-d1" class="hc-input" value="1995-05-15" required>
                </div>
            </div>

            <div class="hc-partner-card">
                <h4>👤 2. Partner</h4>
                <div class="hc-form-group">
                    <label for="hc-num-n2">Ad Soyad *</label>
                    <input type="text" id="hc-num-n2" class="hc-input" placeholder="Partnerinizin Adı Soyadı" value="Aslı Yılmaz" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-num-d2">Doğum Tarihi *</label>
                    <input type="date" id="hc-num-d2" class="hc-input" value="1996-08-20" required>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcIliskiNumerolojisiHesapla()">💖 İlişki Numerolojisi Haritamızı Çıkar</button>

        <div class="hc-result" id="hc-iliski-numerolojisi-result">
            <div class="hc-num-hero" id="hc-in-hero"></div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">🎴 Çift Numeroloji Matrisi (Yaşam Yolu & Ruh Sinerjisi)</h4>
                <div class="hc-num-compare-grid" id="hc-in-grid"></div>
            </div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">📖 İlişkinin Kimyası, Güçlü Yönleri & Kadersel Tavsiyeler</h4>
                <div class="hc-result-content" id="hc-num-details"></div>
            </div>
        </div>
    </div>
    <?php
}
