<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yakit_tasarrufu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fuel-saving-generic',
        HC_PLUGIN_URL . 'modules/yakit-tasarrufu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-yts-box">
        <h3>Yakıt Tasarrufu Hesaplama</h3>
        <div class="hc-form-group">
            <label>Yıllık Ortalama Mesafe (km)</label>
            <input type="number" id="hc-yts-km" value="15000">
        </div>
        <div class="hc-form-group">
            <label>Eski / Mevcut Tüketim (L/100km)</label>
            <input type="number" step="0.1" id="hc-yts-old" placeholder="Örn: 8.5">
        </div>
        <div class="hc-form-group">
            <label>Yeni / Hedef Tüketim (L/100km)</label>
            <input type="number" step="0.1" id="hc-yts-new" placeholder="Örn: 5.5">
        </div>
        <div class="hc-form-group">
            <label>Yakıt Litre Fiyatı (TL)</label>
            <input type="number" step="0.01" id="hc-yts-price">
        </div>
        <button class="hc-btn" onclick="hcYtsHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yts-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Yıllık Yakıt Tasarrufu:</strong><br><span id="hc-yts-litres">-</span></div>
                <div><strong>Yıllık Maddi Kazanç:</strong><br><span id="hc-yts-money">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
