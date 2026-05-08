<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sarj_istasyonu_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-charger-setup',
        HC_PLUGIN_URL . 'modules/sarj-istasyonu-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-sim-box">
        <h3>Şarj İstasyonu Kurulum Maliyeti</h3>
        <div class="hc-form-group">
            <label>Cihaz Tipi (Wallbox)</label>
            <select id="hc-sim-device">
                <option value="15000">Standart 7.4 kW (15.000 ₺)</option>
                <option value="25000">Gelişmiş 11/22 kW (25.000 ₺)</option>
                <option value="50000">DC Hızlı Şarj Cihazı (50.000 ₺+)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Kablo Mesafesi (Metre)</label>
            <input type="number" id="hc-sim-cable" value="10">
        </div>
        <div class="hc-form-group">
            <label>İşçilik ve Kurulum (TL)</label>
            <input type="number" id="hc-sim-labor" value="5000">
        </div>
        <button class="hc-btn" onclick="hcSimHesapla()">Maliyeti Hesapla</button>
        <div class="hc-result" id="hc-sim-result">
            <div class="hc-result-title">Tahmini Toplam Kurulum:</div>
            <div class="hc-result-value" id="hc-sim-val">-</div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* Kablo fiyatı metre başına yaklaşık 250 ₺ olarak hesaplanmıştır.</p>
        </div>
    </div>
    <?php
}
