<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_yasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-yas',
        HC_PLUGIN_URL . 'modules/burc-yasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-yas-css',
        HC_PLUGIN_URL . 'modules/burc-yasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-yas">
        <div class="hc-header">
            <h3>Gezegen Yaşı ve Astrolojik Döngüler Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihinizi girerek Merkür, Venüs, Mars, Jüpiter, Satürn, Uranüs ve Kiron gezegen yaşlarınızı, Satürn Dönüşü ve Kadersel Yaşam Evrenizi öğrenin.</p>
        </div>

        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-byas-birthdate">Doğum Tarihiniz *</label>
                <input type="date" id="hc-byas-birthdate" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-byas-target">Hesaplama Tarihi</label>
                <input type="date" id="hc-byas-target" value="2026-05-15" class="hc-input">
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcBurcYasHesapla()">🪐 Gezegen Yaşlarımı & Döngülerimi Hesapla</button>

        <div class="hc-result" id="hc-byas-result">
            <div class="hc-byas-hero" id="hc-byas-hero"></div>

            <div class="hc-byas-section">
                <h4 class="hc-byas-sec-title">🌌 7 Gezegen Yaşı ve Döngü İlerlemesi</h4>
                <div class="hc-byas-grid" id="hc-byas-grid"></div>
            </div>

            <div class="hc-byas-section">
                <h4 class="hc-byas-sec-title">📖 Astrolojik Yaşam Evresi ve Kadersel Eşikler</h4>
                <div class="hc-result-content" id="hc-byas-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
