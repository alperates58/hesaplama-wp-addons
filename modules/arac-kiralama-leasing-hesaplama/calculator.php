<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_arac_kiralama_leasing_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-leasing-calc',
        HC_PLUGIN_URL . 'modules/arac-kiralama-leasing-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lc-calc">
        <h3>Araç Kiralama / Leasing Hesaplama</h3>
        <div class="hc-form-group">
            <label>Araç Fiyatı (TL)</label>
            <input type="number" id="hc-lc-price" placeholder="Örn: 1.500.000">
        </div>
        <div class="hc-form-group">
            <label>İlk Ödeme / Peşinat (TL)</label>
            <input type="number" id="hc-lc-down" placeholder="Örn: 150.000">
        </div>
        <div class="hc-form-group">
            <label>Vade Sonu Geri Alım Değeri (Residual %)</label>
            <input type="number" id="hc-lc-residual" value="20" placeholder="Örn: 20">
        </div>
        <div class="hc-form-group">
            <label>Vade (Ay)</label>
            <select id="hc-lc-term">
                <option value="12">12 Ay</option>
                <option value="24">24 Ay</option>
                <option value="36" selected>36 Ay</option>
                <option value="48">48 Ay</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Yıllık Faiz Oranı (%)</label>
            <input type="number" step="0.01" id="hc-lc-interest" placeholder="Örn: 45">
        </div>
        <button class="hc-btn" onclick="hcLcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-lc-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Aylık Kira Bedeli:</strong><br><span id="hc-lc-monthly">-</span></div>
                <div><strong>Toplam Ödeme:</strong><br><span id="hc-lc-total">-</span></div>
                <div><strong>Geri Alım Tutarı:</strong><br><span id="hc-lc-res-val">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
