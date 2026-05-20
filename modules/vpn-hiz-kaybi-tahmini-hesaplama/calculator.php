<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vpn_hiz_kaybi_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vpn-hiz-kaybi-tahmini-hesaplama',
        HC_PLUGIN_URL . 'modules/vpn-hiz-kaybi-tahmini-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-vpn-speed-loss">
        <h3>VPN Hız Kaybı Tahmini Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-vpn-hiz">Mevcut İnternet Hızınız (Download - Mbps)</label>
            <input type="number" id="hc-vpn-hiz" min="1" value="75" />
        </div>

        <div class="hc-form-group">
            <label for="hc-vpn-ping">Varsayılan Gecikme Süreniz (Ping - ms)</label>
            <input type="number" id="hc-vpn-ping" min="1" value="15" />
        </div>

        <div class="hc-form-group">
            <label for="hc-vpn-protokol">Kullanılan VPN Protokolü</label>
            <select id="hc-vpn-protokol">
                <option value="wireguard">WireGuard (Modern, Çok Hızlı - %5-10 Kayıp)</option>
                <option value="openvpn-udp">OpenVPN (UDP) (Güvenli, Standart - %12-20 Kayıp)</option>
                <option value="openvpn-tcp">OpenVPN (TCP) (Çok Güvenli ama Yavaş - %25-35 Kayıp)</option>
                <option value="l2tp">L2TP / IPsec (Eski Protokol - %15-25 Kayıp)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-vpn-mesafe">VPN Sunucu Konumu (Mesafe)</label>
            <select id="hc-vpn-mesafe">
                <option value="yakin">Yakın Mesafe (Örn: Avrupa Sunucuları - +30 ms Ping)</option>
                <option value="orta">Orta Mesafe (Örn: ABD Doğu Yakası - +110 ms Ping)</option>
                <option value="uzak">Uzak Mesafe (Örn: Asya / Pasifik / Avustralya - +250 ms Ping)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-vpn-cihaz">Cihaz Donanım Seviyesi (Şifreleme Performansı)</label>
            <select id="hc-vpn-cihaz">
                <option value="0">Yüksek (Modern Bilgisayar / Akıllı Telefon / Güçlü Router)</option>
                <option value="0.10">Orta / Düşük (Giriş Seviye Akıllı TV / Eski Router / Zayıf İşlemci)</option>
            </select>
            <small style="color:#666;font-size:12px;">VPN trafiği donanım seviyesinde yoğun şifreleme (encryption) gerektirir. Zayıf işlemciler hız kaybını artırır.</small>
        </div>

        <button class="hc-btn" onclick="hcVpnHizKaybiTahminiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-vpn-speed-result">
            <table>
                <tr>
                    <td>Tahmini VPN Download Hızı</td>
                    <td><strong class="hc-result-value" id="hc-vpn-res-hiz" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Hız Kayıp Oranı (%)</td>
                    <td><strong id="hc-vpn-res-kayip" style="color: var(--hc-front-red);">-</strong></td>
                </tr>
                <tr>
                    <td>Tahmini VPN Ping Süresi</td>
                    <td><strong id="hc-vpn-res-ping" style="color: var(--hc-front-red);">-</strong></td>
                </tr>
                <tr>
                    <td>Bağlantı Uygunluk Yorumu</td>
                    <td><strong id="hc-vpn-res-yorum" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
