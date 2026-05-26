<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ehliyet_puan_kaybi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ehliyet-puan-kaybi',
        HC_PLUGIN_URL . 'modules/ehliyet-puan-kaybi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ehliyet-puan-kaybi-css',
        HC_PLUGIN_URL . 'modules/ehliyet-puan-kaybi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ehliyet-puan-kaybi-hesaplama">
        <h3>Ehliyet Puan Kaybı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-epk-mevcut">Mevcut Ceza Puanınız (1 yıl içinde birikmiş)</label>
            <input type="number" id="hc-epk-mevcut" placeholder="0" min="0" max="100" value="0">
        </div>

        <div class="hc-form-group">
            <label style="font-weight:bold; margin-bottom:8px; display:block;">Yapılan İhlalleri Seçiniz:</label>
            <div style="display:flex; flex-direction:column; gap:8px;">
                <label style="font-weight:normal; display:flex; align-items:center; gap:8px;">
                    <input type="checkbox" class="hc-epk-ihlal" value="20" style="width:auto; min-height:auto; display:inline;">
                    Kırmızı Işık İhlali (20 Puan)
                </label>
                <label style="font-weight:normal; display:flex; align-items:center; gap:8px;">
                    <input type="checkbox" class="hc-epk-ihlal" value="15" style="width:auto; min-height:auto; display:inline;">
                    Emniyet Kemeri Takmamak (15 Puan)
                </label>
                <label style="font-weight:normal; display:flex; align-items:center; gap:8px;">
                    <input type="checkbox" class="hc-epk-ihlal" value="10" style="width:auto; min-height:auto; display:inline;">
                    Seyir Halinde Telefon Kullanmak (10 Puan)
                </label>
                <label style="font-weight:normal; display:flex; align-items:center; gap:8px;">
                    <input type="checkbox" class="hc-epk-ihlal" value="15" style="width:auto; min-height:auto; display:inline;">
                    Hız Sınırını %30-50 Aşmak (15 Puan)
                </label>
                <label style="font-weight:normal; display:flex; align-items:center; gap:8px;">
                    <input type="checkbox" class="hc-epk-ihlal" value="20" style="width:auto; min-height:auto; display:inline;">
                    Alkollü Araç Kullanmak (20 Puan)
                </label>
                <label style="font-weight:normal; display:flex; align-items:center; gap:8px;">
                    <input type="checkbox" class="hc-epk-ihlal" value="20" style="width:auto; min-height:auto; display:inline;">
                    Makas Atmak / Tehlikeli Şerit Değiştirmek (20 Puan)
                </label>
                <label style="font-weight:normal; display:flex; align-items:center; gap:8px;">
                    <input type="checkbox" class="hc-epk-ihlal" value="10" style="width:auto; min-height:auto; display:inline;">
                    Muayenesiz Araç Kullanmak (10 Puan)
                </label>
            </div>
        </div>

        <button class="hc-btn" onclick="hcEhliyetPuanHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-epk-result">
            <h4>Ceza Puan Durumu Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Biriken Ceza Puanı</td>
                        <td id="hc-epk-res-toplam" style="font-weight:bold; font-size:18px;">0 Puan</td>
                    </tr>
                    <tr style="font-size:15px; font-weight:bold;">
                        <td>Ehliyete El Konulma Durumu</td>
                        <td id="hc-epk-res-durum" style="color:var(--hc-front-blue-dark);">Risk Yok</td>
                    </tr>
                </tbody>
            </table>
            <div id="hc-epk-detay-aciklama" style="margin-top:14px; padding:10px; background:#f8fafc; border-radius:8px; font-size:12px; color:#475569; line-height:1.4;"></div>
        </div>
    </div>
    <?php
}