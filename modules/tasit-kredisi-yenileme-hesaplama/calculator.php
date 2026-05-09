<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tasit_kredisi_yenileme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tk-yenileme',
        HC_PLUGIN_URL . 'modules/tasit-kredisi-yenileme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tky-calc">
        <h3>Taşıt Kredisi Yenileme Hesaplama</h3>
        <div class="hc-form-section">
            <h4>Mevcut Kredi Bilgileri</h4>
            <div class="hc-form-group">
                <label>Kalan Anapara Borcu (TL)</label>
                <input type="number" id="hc-tky-current-balance" placeholder="Örn: 500.000">
            </div>
            <div class="hc-form-group">
                <label>Mevcut Aylık Taksit (TL)</label>
                <input type="number" id="hc-tky-current-monthly" placeholder="Örn: 25.000">
            </div>
            <div class="hc-form-group">
                <label>Kalan Vade (Ay)</label>
                <input type="number" id="hc-tky-current-term" placeholder="Örn: 24">
            </div>
        </div>
        <div class="hc-form-section">
            <h4>Yeni Kredi Teklifi</h4>
            <div class="hc-form-group">
                <label>Yeni Aylık Faiz Oranı (%)</label>
                <input type="number" step="0.01" id="hc-tky-new-rate" placeholder="Örn: 3.20">
            </div>
            <div class="hc-form-group">
                <label>Dosya Masrafı vb. Ek Giderler (TL)</label>
                <input type="number" id="hc-tky-fees" placeholder="Örn: 5.000">
            </div>
        </div>
        <button class="hc-btn" onclick="hcTkyHesapla()">Avantajı Hesapla</button>
        <div class="hc-result" id="hc-tky-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Yeni Taksit:</strong><br><span id="hc-tky-new-monthly">-</span></div>
                <div><strong>Toplam Kazanç:</strong><br><span id="hc-tky-total-saving">-</span></div>
            </div>
            <div id="hc-tky-summary" style="margin-top: 10px; font-weight: bold;"></div>
        </div>
    </div>
    <?php
}
