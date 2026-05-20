<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_wifi_sinyal_gucu_mesafe_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wifi-sinyal-gucu-mesafe-hesaplama',
        HC_PLUGIN_URL . 'modules/wifi-sinyal-gucu-mesafe-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-wifi-signal">
        <h3>WiFi Sinyal Gücü Mesafe Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-wifi-mesafe">Mesafe (Metre - m)</label>
            <input type="number" id="hc-wifi-mesafe" min="0.5" step="0.5" value="10" />
            <small style="color:#666;font-size:12px;">Alıcı cihaz ile WiFi dağıtıcı (Router/Modem) arasındaki düz mesafe.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-wifi-frekans">WiFi Frekans Bandı</label>
            <select id="hc-wifi-frekans">
                <option value="2400">2.4 GHz (Uzak mesafe, düşük hız)</option>
                <option value="5000" selected>5 GHz (Kısa mesafe, yüksek hız - Standart)</option>
                <option value="6000">6 GHz (Çok kısa mesafe, ultra hız - Wi-Fi 6E / Wi-Fi 7)</option>
            </select>
        </div>

        <div style="background:#f4f7fa; padding:15px; border-radius:8px; margin-bottom:15px;">
            <h4 style="margin-top:0; margin-bottom:10px; font-size:14px;">Aradaki Engeller (Adet)</h4>
            
            <div class="hc-form-group" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                <label style="flex:1;">İnce Duvar / Alçıpan</label>
                <input type="number" id="hc-wifi-eng-alcipan" min="0" value="1" style="width:70px;" />
            </div>

            <div class="hc-form-group" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                <label style="flex:1;">Tuğla / Betonarme Duvar</label>
                <input type="number" id="hc-wifi-eng-beton" min="0" value="1" style="width:70px;" />
            </div>

            <div class="hc-form-group" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                <label style="flex:1;">Cam Bölme / Pencere</label>
                <input type="number" id="hc-wifi-eng-cam" min="0" value="0" style="width:70px;" />
            </div>

            <div class="hc-form-group" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0;">
                <label style="flex:1;">Metal Kapı / Demir Engel</label>
                <input type="number" id="hc-wifi-eng-metal" min="0" value="0" style="width:70px;" />
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-wifi-tx">Modem / Router Çıkış Gücü (Tx Power - dBm)</label>
            <input type="number" id="hc-wifi-tx" min="10" max="30" value="20" />
            <small style="color:#666;font-size:12px;">Türkiye/Avrupa yasal sınırı genellikle 20 dBm'dir (100 mW).</small>
        </div>

        <button class="hc-btn" onclick="hcWifiSinyalGucuMesafeHesapla()">Sinyal Gücünü Hesapla</button>

        <div class="hc-result" id="hc-wifi-signal-result">
            <table>
                <tr>
                    <td>Serbest Alan Yol Kaybı (FSPL)</td>
                    <td><strong id="hc-wifi-res-fspl">-</strong></td>
                </tr>
                <tr>
                    <td>Engel Kaynaklı Toplam Kayıp</td>
                    <td><strong id="hc-wifi-res-engel-kayip" style="color: var(--hc-front-red);">-</strong></td>
                </tr>
                <tr>
                    <td>Tahmini Sinyal Gücü (RSSI)</td>
                    <td><strong class="hc-result-value" id="hc-wifi-res-rssi" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Bağlantı Kalitesi Yorumu</td>
                    <td><strong id="hc-wifi-res-yorum">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
