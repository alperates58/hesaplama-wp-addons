<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yag_degisim_araligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yag-degisim',
        HC_PLUGIN_URL . 'modules/yag-degisim-araligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-yda-box">
        <h3>Yağ Değişim Aralığı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Yağ Tipi</label>
            <select id="hc-yda-oil-type">
                <option value="15000">Tam Sentetik (Modern Araçlar)</option>
                <option value="10000">Yarı Sentetik</option>
                <option value="5000">Mineral Yağ (Eski Araçlar)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Kullanım Koşulları</label>
            <select id="hc-yda-usage">
                <option value="1.0">Normal (Karma kullanım)</option>
                <option value="0.7">Ağır (Yoğun trafik, kısa mesafe)</option>
                <option value="0.6">Çok Ağır (Sürekli dur-kalk, tozlu ortam, çekme)</option>
                <option value="1.1">Uzun Yol (Sabit hız, otoyol)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcYdaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yda-result">
            <div class="hc-result-title">Önerilen Değişim Kilometresi:</div>
            <div class="hc-result-value" id="hc-yda-val">-</div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* Kilometre dolmasa bile motor yağının yılda en az bir kez değişmesi önerilir.</p>
        </div>
    </div>
    <?php
}
