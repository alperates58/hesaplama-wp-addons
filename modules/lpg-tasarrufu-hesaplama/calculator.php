<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lpg_tasarrufu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lpg-saving-calc',
        HC_PLUGIN_URL . 'modules/lpg-tasarrufu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lts-box">
        <h3>LPG Benzin Karşılaştırma Hesaplama</h3>
        <div class="hc-form-group">
            <label>Aylık Ortalama KM</label>
            <input type="number" id="hc-lts-km" value="1500">
        </div>
        <div class="hc-form-group">
            <label>Benzin Tüketimi (L/100km)</label>
            <input type="number" step="0.1" id="hc-lts-cons" value="8.0">
        </div>
        <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
            <div class="hc-form-group"><label>Benzin Fiyatı (TL)</label><input type="number" step="0.01" id="hc-lts-p-price"></div>
            <div class="hc-form-group"><label>LPG Fiyatı (TL)</label><input type="number" step="0.01" id="hc-lts-l-price"></div>
        </div>
        <div class="hc-form-group">
            <label>LPG Dönüşüm Maliyeti (TL)</label>
            <input type="number" id="hc-lts-cost" placeholder="Örn: 25.000">
        </div>
        <button class="hc-btn" onclick="hcLtsHesapla()">Tasarrufu Hesapla</button>
        <div class="hc-result" id="hc-lts-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Aylık Tasarruf:</strong><br><span id="hc-lts-monthly">-</span></div>
                <div><strong>Amortisman Süresi:</strong><br><span id="hc-lts-payback">-</span></div>
            </div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* LPG tüketimi benzin tüketiminden %20 fazla olarak hesaplanmıştır.</p>
        </div>
    </div>
    <?php
}
