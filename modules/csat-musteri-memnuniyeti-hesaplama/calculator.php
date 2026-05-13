<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_csat_musteri_memnuniyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-csat-musteri-memnuniyeti-hesaplama',
        HC_PLUGIN_URL . 'modules/csat-musteri-memnuniyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-csat-musteri-memnuniyeti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/csat-musteri-memnuniyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-csat">
        <h3>CSAT (Müşteri Memnuniyeti) Hesaplama</h3>
        <p style="font-size: 0.9em; color: #666; margin-bottom: 15px;">5'li ölçekte (1: Çok Kötü, 5: Çok İyi) yanıt sayılarını girin.</p>
        <div class="hc-csat-inputs">
            <div class="hc-form-group">
                <label for="hc-csat-5">5 Yıldız (Çok Memnun):</label>
                <input type="number" id="hc-csat-5" class="hc-input" placeholder="0">
            </div>
            <div class="hc-form-group">
                <label for="hc-csat-4">4 Yıldız (Memnun):</label>
                <input type="number" id="hc-csat-4" class="hc-input" placeholder="0">
            </div>
            <div class="hc-form-group">
                <label for="hc-csat-3">3 Yıldız (Kararsız):</label>
                <input type="number" id="hc-csat-3" class="hc-input" placeholder="0">
            </div>
            <div class="hc-form-group">
                <label for="hc-csat-2">2 Yıldız (Memnun Değil):</label>
                <input type="number" id="hc-csat-2" class="hc-input" placeholder="0">
            </div>
            <div class="hc-form-group">
                <label for="hc-csat-1">1 Yıldız (Hiç Memnun Değil):</label>
                <input type="number" id="hc-csat-1" class="hc-input" placeholder="0">
            </div>
        </div>
        <button class="hc-btn" onclick="hcCSATHesapla()">CSAT Hesapla</button>
        <div class="hc-result" id="hc-csat-musteri-memnuniyeti-hesaplama-result">
            <div class="hc-result-label">CSAT Skoru:</div>
            <div class="hc-result-value" id="hc-res-csat-val">-</div>
            <p id="hc-csat-desc" style="margin-top:10px; font-size:0.9em; font-weight:bold;"></p>
            <p style="font-size: 0.8em; color: #666; margin-top: 5px;">Formül: (4 ve 5 Yıldız Sayısı / Toplam Yanıt Sayısı) * 100</p>
        </div>
    </div>
    <?php
}
