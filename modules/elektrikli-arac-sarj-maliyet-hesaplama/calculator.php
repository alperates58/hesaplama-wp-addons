<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_arac_sarj_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-charge',
        HC_PLUGIN_URL . 'modules/elektrikli-arac-sarj-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ev-charge-css',
        HC_PLUGIN_URL . 'modules/elektrikli-arac-sarj-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-elektrikli-arac-sarj-maliyet-hesaplama">
        <h3>Elektrikli Araç Şarj Maliyeti</h3>
        <div class="hc-form-group">
            <label for="hc-esc-batarya">Batarya Kapasitesi (kWh)</label>
            <input type="number" id="hc-esc-batarya" value="60" min="10" max="150">
        </div>
        <div class="hc-form-group">
            <label for="hc-esc-sarj">Şarj Edilecek Miktar (%)</label>
            <select id="hc-esc-sarj">
                <option value="20-80">%20\'den %80\'e (Hızlı DC Şarj Aralığı)</option>
                <option value="10-100">%10\'dan %100\'e (Tam Doluma Yakın)</option>
                <option value="0-100" selected>%0\'dan %100\'e (Tam Dolum)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-esc-istasyon">İstasyon & Tarife Türü</label>
            <select id="hc-esc-istasyon">
                <option value="3.2" selected>Evden Priz / AC Yavaş Şarj (3.20 ₺ / kWh)</option>
                <option value="7.5">Halka Açık AC Şarj İstasyonu (7.50 ₺ / kWh)</option>
                <option value="10.8">Halka Açık DC Hızlı Şarj İstasyonu (10.80 ₺ / kWh)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcEvChargeHesapla()">Şarj Bütçesini Hesapla</button>
        
        <div class="hc-result" id="hc-esc-result">
            <h4>Elektrikli Araç Şarj Analiz Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Çekilecek Toplam Elektrik Gücü</td>
                        <td id="hc-esc-res-guc">0 kWh</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Tahmini Şarj Dolum Maliyeti</td>
                        <td id="hc-esc-res-maliyet">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Kilometre Başı Elektrik Tüketim Maliyeti</td>
                        <td id="hc-esc-res-km-maliyet">0.00 ₺ / km</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}