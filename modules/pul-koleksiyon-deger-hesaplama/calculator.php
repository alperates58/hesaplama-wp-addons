<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pul_koleksiyon_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stamp-val',
        HC_PLUGIN_URL . 'modules/pul-koleksiyon-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stamp-val-css',
        HC_PLUGIN_URL . 'modules/pul-koleksiyon-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pul-koleksiyon-deger-hesaplama">
        <h3>Pul Koleksiyon Değer Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pkd-katalog">Katalog Değeri (Scott, Michel vb. - ₺/$)</label>
            <input type="number" id="hc-pkd-katalog" placeholder="Örn: 500" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-pkd-kondisyon">Kondisyon / Yapıştırıcı Durumu</label>
            <select id="hc-pkd-kondisyon">
                <option value="1.0">MNH (Mint Never Hinged - Damgasız, Orijinal Şirazeli - %100 Değer)</option>
                <option value="0.6">MLH (Mint Lightly Hinged - Damgasız, Hafif İzli - %60 Değer)</option>
                <option value="0.25">Used (Kullanılmış / Damgalı - %25 Değer)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-pkd-sertifika">Derecelendirme / Sertifika Durumu</label>
            <select id="hc-pkd-sertifika">
                <option value="1.0">Sertifikasız (Standart Derece)</option>
                <option value="1.2">Sertifikalı (Yetkili Kurum Onaylı - +%20 Değer)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-pkd-hata">Hatalı Basım / Varyete Durumu</label>
            <select id="hc-pkd-hata">
                <option value="0">Normal Pul (Hata Yok)</option>
                <option value="0.5">Küçük Renk/Diş Varyetesi (+%50)</option>
                <option value="2.0">Büyük Ters Basım / Dantel Hatası (+%200)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcPulDegeriHesapla()">Tahmini Piyasa Değerini Hesapla</button>
        
        <div class="hc-result" id="hc-pkd-result">
            <h4>Pul Değerleme Analizi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Kondisyon Çarpan Katsayısı</td>
                        <td id="hc-pkd-res-kond-carp">1.0x</td>
                    </tr>
                    <tr>
                        <td>Varyete / Hata Katkısı</td>
                        <td id="hc-pkd-res-varyete">+%0</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Tahmini Realize Piyasa Fiyatı</td>
                        <td id="hc-pkd-res-piyasa">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}