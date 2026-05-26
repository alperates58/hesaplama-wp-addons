<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tuketici_mahkemesi_deger_siniri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tuketici-mahkemesi-deger-siniri',
        HC_PLUGIN_URL . 'modules/tuketici-mahkemesi-deger-siniri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tuketici-mahkemesi-deger-siniri-css',
        HC_PLUGIN_URL . 'modules/tuketici-mahkemesi-deger-siniri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tuketici-mahkemesi-deger-siniri-hesaplama">
        <h3>Tüketici Mahkemesi Değer Sınırı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tmds-tutar">Uyuşmazlık Bedeli (Ürün veya Hizmet Bedeli) (₺)</label>
            <input type="number" id="hc-tmds-tutar" placeholder="Örn: 150000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-tmds-yil">İşlem Yapılacak Yıl</label>
            <select id="hc-tmds-yil">
                <option value="2026">2026 Yılı (Yasal Sınır: 186.000 ₺)</option>
                <option value="2025">2025 Yılı (Yasal Sınır: 149.000 ₺)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTuketiciSiniriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tmds-result">
            <div id="hc-tmds-durum-title" style="padding:14px; border-radius:10px; font-weight:bold; font-size:16px; margin-bottom:14px; text-align:center;"></div>
            <h4>Uyuşmazlık Çözüm Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Yıllık Parasal Tavan Sınırı</td>
                        <td id="hc-tmds-res-limit">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Başvuru Mercii</td>
                        <td id="hc-tmds-res-mercii" style="font-weight:bold; color:var(--hc-front-blue-dark);">Bilinmiyor</td>
                    </tr>
                    <tr>
                        <td>Dava Şartı / Zorunluluk</td>
                        <td id="hc-tmds-res-zorunluluk">Hakem Heyetine Başvuru Yasal Zorunluluktur.</td>
                    </tr>
                </tbody>
            </table>
            <div id="hc-tmds-res-not" style="margin-top:14px; padding:10px; background:#f8fafc; border-radius:8px; font-size:12px; color:#475569; line-height:1.4;"></div>
        </div>
    </div>
    <?php
}