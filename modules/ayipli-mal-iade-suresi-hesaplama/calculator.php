<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ayipli-mal-iade-suresi_hesaplama( $atts ) {
    // Note: To match shortcode tag requirements we keep standard function name
}

function hc_render_ayipli_mal_iade_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ayipli-mal-iade',
        HC_PLUGIN_URL . 'modules/ayipli-mal-iade-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ayipli-mal-iade-css',
        HC_PLUGIN_URL . 'modules/ayipli-mal-iade-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ayipli-mal-iade-suresi-hesaplama">
        <h3>Ayıplı Mal İade Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ami-tur">Satın Alınan Ürün / Mal Türü</label>
            <select id="hc-ami-tur">
                <option value="standart">Standart Tüketici Malı (Telefon, Kıyafet, Beyaz Eşya - 2 Yıl)</option>
                <option value="ikinci_el">İkinci El Tüketici Malı (En az 1 Yıl)</option>
                <option value="ikinci_el_tasit">İkinci El Motorlu Kara Taşıtı (En az 2 Yıl)</option>
                <option value="tasinmaz">Taşınmaz Konut / Devre Tatil Konutu (5 Yıl)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ami-teslim">Malın Teslim Alındığı / Satın Alındığı Tarih</label>
            <input type="date" id="hc-ami-teslim">
        </div>
        <div class="hc-form-group">
            <label for="hc-ami-tespit">Ayıbın / Kusurun Tespit Edildiği Tarih</label>
            <input type="date" id="hc-ami-tespit">
        </div>
        <button class="hc-btn" onclick="hcAyipliMalHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ami-result">
            <div id="hc-ami-durum-box" style="padding:12px; border-radius:8px; font-size:14px; font-weight:bold; margin-bottom:12px;"></div>
            <h4>Yasal Sorumluluk Süresi Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Satıcı Sorumluluk Süresi</td>
                        <td id="hc-ami-res-limit">0 Yıl</td>
                    </tr>
                    <tr>
                        <td>Kalan Sorumluluk Süresi</td>
                        <td id="hc-ami-res-kalan">0 Gün</td>
                    </tr>
                    <tr>
                        <td>Ayıp İspat Kolaylığı (İlk 6 Ay Kuralı)</td>
                        <td id="hc-ami-res-ispat" style="font-weight:bold;">Bilinmiyor</td>
                    </tr>
                </tbody>
            </table>
            <div style="margin-top:14px; padding:10px; background:#f8fafc; border-radius:8px; font-size:12px; color:#475569; line-height:1.4;">
                * Yasal Haklar: Üründe ayıp çıkması halinde tüketici yasal olarak; sözleşmeden dönme (iade), satış bedelinden indirim, ücretsiz onarım veya yenisiyle değişim haklarından birini seçebilir.
            </div>
        </div>
    </div>
    <?php
}