<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_internet_bant_genisligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-internet-bant-genisligi-hesaplama',
        HC_PLUGIN_URL . 'modules/internet-bant-genisligi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-internet-bandwidth">
        <h3>İnternet Bant Genişliği Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ibg-kullanici">Toplam Kullanıcı / Cihaz Sayısı</label>
            <input type="number" id="hc-ibg-kullanici" min="1" value="4" />
        </div>

        <div class="hc-form-group">
            <label for="hc-ibg-profil">Kullanım Profili</label>
            <select id="hc-ibg-profil">
                <option value="5">Hafif Kullanım (E-posta, temel web sayfaları, müzik dinleme - 5 Mbps / kişi)</option>
                <option value="15" selected>Orta Seviye (FHD video izleme, sosyal medya, uzaktan çalışma - 15 Mbps / kişi)</option>
                <option value="40">Yoğun Kullanım (4K video akışı, büyük dosya indirme, online oyunlar - 40 Mbps / kişi)</option>
                <option value="100">Aşırı Yoğun (Profesyonel canlı yayın, 4K/8K çoklu video akışı, bulut oyunculuk - 100 Mbps / kişi)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ibg-aktiflik">Eş Zamanlı Aktiflik Oranı (%)</label>
            <input type="number" id="hc-ibg-aktiflik" min="10" max="100" value="80" />
            <small style="color:#666;font-size:12px;">Cihazların yüzde kaçının aynı anda tam güçte internet kullandığı (genelde evlerde %80, ofislerde %60-%70).</small>
        </div>

        <button class="hc-btn" onclick="hcInternetBantGenisligiHesapla()">Bant Genişliğini Hesapla</button>

        <div class="hc-result" id="hc-internet-bandwidth-result">
            <table>
                <tr>
                    <td>Maksimum Olası Bant Genişliği İhtiyacı</td>
                    <td><strong id="hc-ibg-res-maks">-</strong></td>
                </tr>
                <tr>
                    <td>Tavsiye Edilen Asgari Hız</td>
                    <td><strong class="hc-result-value" id="hc-ibg-res-asgari" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Hız Sınıflandırması Önerisi</td>
                    <td><strong id="hc-ibg-res-paket" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
