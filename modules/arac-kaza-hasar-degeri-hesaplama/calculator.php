<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_arac_kaza_hasar_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-car-deprec',
        HC_PLUGIN_URL . 'modules/arac-kaza-hasar-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-car-deprec-css',
        HC_PLUGIN_URL . 'modules/arac-kaza-hasar-degeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-arac-kaza-hasar-degeri-hesaplama">
        <h3>Araç Kaza Hasar Değeri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-akh-deger">Kaza Öncesi Aracın Serbest Piyasa Değeri (₺)</label>
            <input type="number" id="hc-akh-deger" placeholder="Örn: 900000" min="10000">
        </div>
        <div class="hc-form-group">
            <label for="hc-akh-km">Aracın Kilometresi</label>
            <input type="number" id="hc-akh-km" value="65000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-akh-yas">Araç Yaşı</label>
            <input type="number" id="hc-akh-yas" value="3" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-akh-hasar">Kaza / Hasar Şiddeti ve Bölgesi</label>
            <select id="hc-akh-hasar">
                <option value="0.03">Hafif Hasar (Sadece boya / plastik parça - %3)</option>
                <option value="0.08" selected>Orta Hasar (Cıvatalı parça değişimi, tampon vb. - %8)</option>
                <option value="0.16">Ağır Hasar (Kaynaklı kaporta değişimi, direk, airbag, şasi işlemleri - %16)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-akh-gecmis">Aracın Geçmiş Hasar Geçmişi</label>
            <select id="hc-akh-gecmis">
                <option value="1.0" selected>Hasarsız / Boyasız (İlk Kaza)</option>
                <option value="0.75">Lokal Boyalı parçalar vardı</option>
                <option value="0.50">Değişen parçalar mevcuttu</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcAracHasarDegeriHesapla()">Değer Kaybını Hesapla</button>
        
        <div class="hc-result" id="hc-akh-result">
            <h4>Değer Kaybı (Tramer) Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Kilometre Katsayı Çarpanı</td>
                        <td id="hc-akh-res-km-kat">1.00</td>
                    </tr>
                    <tr>
                        <td>Araç Yaşı Katsayı Çarpanı</td>
                        <td id="hc-akh-res-yas-kat">1.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Tahmini Toplam Değer Kaybı</td>
                        <td id="hc-akh-res-kayip">0.00 ₺</td>
                    </tr>
                    <tr style="font-weight:bold;">
                        <td>Kaza Sonrası Yeni Araç Değeri</td>
                        <td id="hc-akh-res-yeni-deger">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}