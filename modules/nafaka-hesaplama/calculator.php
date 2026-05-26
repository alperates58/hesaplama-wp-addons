<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nafaka_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nafaka-hesaplama',
        HC_PLUGIN_URL . 'modules/nafaka-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-nafaka-hesaplama-css',
        HC_PLUGIN_URL . 'modules/nafaka-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-nafaka-hesaplama">
        <h3>Nafaka Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-nafaka-odeyen-gelir">Nafaka Yükümlüsünün (Ödeyecek Eş) Aylık Net Geliri (₺)</label>
            <input type="number" id="hc-nafaka-odeyen-gelir" placeholder="Örn: 35000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-nafaka-alan-gelir">Nafaka Alacak Eşin Aylık Net Geliri (₺)</label>
            <input type="number" id="hc-nafaka-alan-gelir" placeholder="Varsa giriniz, yoksa 0" min="0" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-nafaka-cocuk-sayisi">Müşterek Çocuk Sayısı</label>
            <select id="hc-nafaka-cocuk-sayisi">
                <option value="0">Çocuk Yok</option>
                <option value="1">1 Çocuk</option>
                <option value="2">2 Çocuk</option>
                <option value="3">3 Çocuk</option>
                <option value="4">4 Çocuk</option>
                <option value="5">5 Çocuk</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-nafaka-sosyal-durum">Tarafların Sosyal-Ekonomik Durumu (SED)</label>
            <select id="hc-nafaka-sosyal-durum">
                <option value="orta">Orta (Standart Davalar)</option>
                <option value="dusuk">Asgari Ücret / Düşük Gelir Grubu</option>
                <option value="yuksek">Yüksek Gelir Grubu</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcNafakaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-nafaka-hesaplama-result">
            <h4>Hesaplanan Tahmini Nafaka Tutarları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td><strong>Spousal Alimony (Yoksulluk Nafakası)</strong></td>
                        <td id="hc-nafaka-res-yoksulluk">0 ₺</td>
                    </tr>
                    <tr>
                        <td><strong>Child Support (İştirak Nafakası - Toplam)</strong></td>
                        <td id="hc-nafaka-res-istirak">0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Toplam Tahmini Aylık Nafaka</td>
                        <td id="hc-nafaka-res-toplam">0 ₺</td>
                    </tr>
                </tbody>
            </table>
            <div style="margin-top:14px; padding:10px; background:#f8fafc; border-radius:8px; font-size:12px; color:#475569; line-height:1.4;">
                * Yasal Uyarı: Türk Medeni Kanunu uyarınca nafaka takdirinde kesin bir matematiksel formül yoktur. Mahkeme hakimi tarafların gerçek sosyal ve ekonomik durum araştırması (SED) sonuçlarına göre hakkaniyete uygun karar verir. Bu hesaplama Yargıtay kararlarındaki genel eğilimleri yansıtan tahmini bir rehberdir.
            </div>
        </div>
    </div>
    <?php
}