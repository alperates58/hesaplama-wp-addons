<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karmik_ders_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-karmik-ders-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/karmik-ders-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-karmik-ders-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/karmik-ders-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-karmic-lesson">
        <h3>Karmik Ders Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kl-name">Tam Adınız:</label>
            <input type="text" id="hc-kl-name" class="hc-input" placeholder="Örn: Elif Yılmaz">
        </div>
        <button class="hc-btn" onclick="hcKarmicLessonHesapla()">Dersleri Analiz Et</button>
        <div class="hc-result" id="hc-karmik-ders-sayisi-hesaplama-result">
            <div class="hc-result-label">Eksik Sayılar (Karmik Dersler):</div>
            <div class="hc-result-value" id="hc-res-kl-val">-</div>
            <div id="hc-res-kl-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
