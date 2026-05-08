<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_arac_bakim_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bakim-calc',
        HC_PLUGIN_URL . 'modules/arac-bakim-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bm-box">
        <h3>Araç Bakım Maliyeti Hesaplama</h3>
        <div class="hc-form-section">
            <div class="hc-form-group"><label><input type="checkbox" class="hc-bm-item" data-price="1800"> Motor Yağı (5L)</label></div>
            <div class="hc-form-group"><label><input type="checkbox" class="hc-bm-item" data-price="450"> Yağ Filtresi</label></div>
            <div class="hc-form-group"><label><input type="checkbox" class="hc-bm-item" data-price="600"> Hava Filtresi</label></div>
            <div class="hc-form-group"><label><input type="checkbox" class="hc-bm-item" data-price="850"> Polen Filtresi (Karbonlu)</label></div>
            <div class="hc-form-group"><label><input type="checkbox" class="hc-bm-item" data-price="1200"> Yakıt Filtresi</label></div>
            <div class="hc-form-group"><label><input type="checkbox" class="hc-bm-item" data-price="2500"> Fren Balataları (Ön Set)</label></div>
            <div class="hc-form-group"><label><input type="checkbox" class="hc-bm-item" data-price="6000"> Triger Seti / Kayışlar</label></div>
            <hr>
            <div class="hc-form-group">
                <label>Servis İşçilik Ücreti (TL)</label>
                <input type="number" id="hc-bm-labor" value="1500">
            </div>
        </div>
        <button class="hc-btn" onclick="hcBmHesapla()">Maliyeti Hesapla</button>
        <div class="hc-result" id="hc-bm-result">
            <div class="hc-result-title">Toplam Bakım Tutarı:</div>
            <div class="hc-result-value" id="hc-bm-val">-</div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* Fiyatlar 2026 ortalama piyasa değerlerine göre tahmin edilmiştir.</p>
        </div>
    </div>
    <?php
}
