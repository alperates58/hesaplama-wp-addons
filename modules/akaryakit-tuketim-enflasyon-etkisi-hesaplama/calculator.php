<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akaryakit_tuketim_enflasyon_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fuel-inflation',
        HC_PLUGIN_URL . 'modules/akaryakit-tuketim-enflasyon-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fuel-inflation-css',
        HC_PLUGIN_URL . 'modules/akaryakit-tuketim-enflasyon-etkisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-akaryakit-tuketim-enflasyon-etkisi-hesaplama">
        <h3>Akaryakıt Tüketim Enflasyon Etkisi</h3>
        <div class="hc-form-group">
            <label for="hc-ate-yol">Aylık Sürüş Mesafeniz (km)</label>
            <input type="number" id="hc-ate-yol" value="1200" min="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-ate-tuketim">Ortalama Tüketim (Litre / 100 km)</label>
            <input type="number" id="hc-ate-tuketim" value="6.2" step="0.1" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ate-eski-fiyat">1 Yıl Önceki Akaryakıt Litre Fiyatı (TL)</label>
            <input type="number" id="hc-ate-eski-fiyat" value="23.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ate-yeni-fiyat">Güncel Akaryakıt Litre Fiyatı (TL)</label>
            <input type="number" id="hc-ate-yeni-fiyat" value="43.8" step="any">
        </div>
        <button class="hc-btn" onclick="hcFuelInflationHesapla()">Enflasyon Farkını Analiz Et</button>
        
        <div class="hc-result" id="hc-ate-result">
            <h4>Akaryakıt Bütçe Değişim Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Aylık Tüketilen Yakıt Miktarı</td>
                        <td id="hc-ate-res-litre">0 Litre</td>
                    </tr>
                    <tr>
                        <td>Geçen Yılki Aylık Masrafı</td>
                        <td id="hc-ate-res-eski-masraf">0.00 ₺</td>
                    </tr>
                    <tr style="font-weight:bold; color:#ef4444;">
                        <td>Güncel Aylık Masrafı</td>
                        <td id="hc-ate-res-yeni-masraf">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:#ef4444;">
                        <td>Net Artış Oranı (Yakıt Enflasyonu)</td>
                        <td id="hc-ate-res-artis">%0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}