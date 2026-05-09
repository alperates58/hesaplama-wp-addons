<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_biyocesitlilik_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-biyocesitlilik-indeksi-hesaplama',
        HC_PLUGIN_URL . 'modules/biyocesitlilik-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-biyocesitlilik-indeksi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/biyocesitlilik-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-biyocesitlilik-indeksi-hesaplama">
        <h3>Simpson Biyoçeşitlilik İndeksi Hesaplama</h3>
        <p style="font-size: 0.9em; margin-bottom: 15px; opacity: 0.8;">Her bir türün birey sayısını virgülle ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-bio-counts">Türlerin Birey Sayıları (Virgülle ayırın)</label>
            <input type="text" id="hc-bio-counts" placeholder="Örn: 50, 25, 10, 5">
        </div>
        <button class="hc-btn" onclick="hcBiyocesitlilikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bio-result">
            <div class="hc-bio-grid">
                <div class="hc-bio-item">
                    <span class="hc-result-label">Simpson İndeksi (D):</span>
                    <span class="hc-result-value" id="hc-bio-d">-</span>
                </div>
                <div class="hc-bio-item">
                    <span class="hc-result-label">Çeşitlilik İndeksi (1-D):</span>
                    <span class="hc-result-value" id="hc-bio-idx">-</span>
                </div>
            </div>
            <div class="hc-result-note" id="hc-bio-note"></div>
        </div>
    </div>
    <?php
}
