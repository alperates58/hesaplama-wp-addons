<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_haritasi_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dogum-haritasi-uyumu',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dogum-haritasi-uyumu-css',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dogum-haritasi-uyumu">
        <h3>Doğum Haritası Uyumu Hesaplama</h3>
        <div class="hc-form-grid">
            <div class="hc-person-section">
                <h4>1. Kişi</h4>
                <div class="hc-form-group">
                    <label>Doğum Tarihi</label>
                    <input type="date" id="hc-p1-birthdate" class="hc-input">
                </div>
            </div>
            <div class="hc-person-section">
                <h4>2. Kişi</h4>
                <div class="hc-form-group">
                    <label>Doğum Tarihi</label>
                    <input type="date" id="hc-p2-birthdate" class="hc-input">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcDogumHaritasiUyumuHesapla()">Uyumu Hesapla</button>
        <div class="hc-result" id="hc-dogum-haritasi-uyumu-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Genel Uyum Skoru</span>
                <div class="hc-result-value" id="hc-harmony-score">-</div>
            </div>
            <div class="hc-harmony-details" id="hc-harmony-details">
                <!-- Detaylar buraya -->
            </div>
        </div>
    </div>
    <?php
}
