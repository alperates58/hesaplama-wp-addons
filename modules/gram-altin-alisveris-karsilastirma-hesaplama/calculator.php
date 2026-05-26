<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gram_altin_alisveris_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gold-compare',
        HC_PLUGIN_URL . 'modules/gram-altin-alisveris-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gold-compare-css',
        HC_PLUGIN_URL . 'modules/gram-altin-alisveris-karsilastirma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gram-altin-alisveris-karsilastirma-hesaplama">
        <h3>Gram Altın Alışveriş Karşılaştırma</h3>
        <div class="hc-form-group">
            <label for="hc-gak-miktar">Almak İstediğiniz Gram Miktarı (g)</label>
            <input type="number" id="hc-gak-miktar" value="10" min="0.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-gak-kuyumcu">Kuyumcu Gram Fiyatı Teklifi (TL)</label>
            <input type="number" id="hc-gak-kuyumcu" placeholder="Örn: 2750" min="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-gak-banka">Banka Mobil Şube Gram Satış Fiyatı (TL)</label>
            <input type="number" id="hc-gak-banka" placeholder="Örn: 2720" min="100">
        </div>
        <button class="hc-btn" onclick="hcGoldCompareHesapla()">Seçenekleri Karşılaştır</button>
        
        <div class="hc-result" id="hc-gak-result">
            <h4>Alışveriş Maliyet Karşılaştırması:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Piyasa Referans Fiyatı (Harem/Piyasa)</td>
                        <td id="hc-gak-res-ref">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Kuyumcu Toplam Maliyet</td>
                        <td id="hc-gak-res-kuyumcu">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Banka Toplam Maliyet</td>
                        <td id="hc-gak-res-banka">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Önerilen En Hesaplı Kanal</td>
                        <td id="hc-gak-res-oneri">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}