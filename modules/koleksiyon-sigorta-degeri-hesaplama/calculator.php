<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_koleksiyon_sigorta_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-col-insurance',
        HC_PLUGIN_URL . 'modules/koleksiyon-sigorta-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-col-insurance-css',
        HC_PLUGIN_URL . 'modules/koleksiyon-sigorta-degeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-koleksiyon-sigorta-degeri-hesaplama">
        <h3>Koleksiyon Sigorta Değeri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ksd-toplam">Toplam Koleksiyon Piyasa Değeri (₺ veya $)</label>
            <input type="number" id="hc-ksd-toplam" placeholder="Örn: 250000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ksd-tur">Koleksiyon Türü / Kategorisi</label>
            <select id="hc-ksd-tur">
                <option value="0.008">Nadir Koinler / Pullar (Düşük Risk - %0.8 Temel Oran)</option>
                <option value="0.015">Güzel Sanatlar / Heykeller (Orta Risk - %1.5 Temel Oran)</option>
                <option value="0.02">Kartlar, Figürler, Oyuncaklar (Yüksek Risk - %2.0 Temel Oran)</option>
                <option value="0.012">Antika Eşyalar / Takılar (%1.2 Temel Oran)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ksd-saklama">Saklama Koşulları / Koruma Seviyesi</label>
            <select id="hc-ksd-saklama">
                <option value="0.6">Banka Kiralık Kasası (Maksimum Güvenlik - %40 İndirim)</option>
                <option value="0.8">Ev/Ofis İçi Güvenlikli Çelik Kasa + Alarm (%20 İndirim)</option>
                <option value="1.0" selected>Ev İçi Standart Vitrin / Dolap (İndirimsiz / Standart)</option>
                <option value="1.25">Açıkta / Korumasız Sergileme (+%25 Ekstra Prim)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ksd-konum">Bulunulan Bölge Risk Durumu</label>
            <select id="hc-ksd-konum">
                <option value="0.9">Düşük Doğal Afet / Hırsızlık Riski (İndirimli)</option>
                <option value="1.0" selected>Orta Risk Seviyesi (Standart)</option>
                <option value="1.2">Yüksek Afet / Hırsızlık Seviyesi (+%20 Ekstra Prim)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSigortaHesapla()">Sigorta Primi Hesapla</button>
        
        <div class="hc-result" id="hc-ksd-result">
            <h4>Tahmini Sigorta Teklif Detayları:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Önerilen Toplam Teminat Değeri</td>
                        <td id="hc-ksd-res-teminat">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Tahmini Yıllık Sigorta Primi</td>
                        <td id="hc-ksd-res-prim">0.00</td>
                    </tr>
                    <tr style="font-size:13px; color:#64748b;">
                        <td>Aylık Taksit Karşılığı (Tahmini)</td>
                        <td id="hc-ksd-res-aylik">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}