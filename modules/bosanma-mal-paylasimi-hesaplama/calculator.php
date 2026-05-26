<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bosanma_mal_paylasimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bosanma-mal-paylasimi',
        HC_PLUGIN_URL . 'modules/bosanma-mal-paylasimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bosanma-mal-paylasimi-css',
        HC_PLUGIN_URL . 'modules/bosanma-mal-paylasimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bosanma-mal-paylasimi-hesaplama">
        <h3>Boşanma Mal Paylaşımı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mp-konut">Evlilik Birliğinde Alınan Konut / Arsa Toplam Değeri (₺)</label>
            <input type="number" id="hc-mp-konut" placeholder="Örn: 4000000" min="0" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mp-arac">Evlilik Birliğinde Alınan Taşıt Toplam Değeri (₺)</label>
            <input type="number" id="hc-mp-arac" placeholder="Örn: 800000" min="0" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mp-nakit">Banka Birikimleri, Nakit ve Altın Değeri (₺)</label>
            <input type="number" id="hc-mp-nakit" placeholder="Örn: 250000" min="0" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mp-borc">Bu Varlıklara Ait Kalan Borçlar (Kredi vb.) (₺)</label>
            <input type="number" id="hc-mp-borc" placeholder="Varsa borç tutarı" min="0" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mp-katki-a">Eş A Kişisel Sermaye / Katkı Payı (Miras, Evlilik Öncesi Varlık) (₺)</label>
            <input type="number" id="hc-mp-katki-a" placeholder="Örn: Eş A'nın babasından kalan miras" min="0" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mp-katki-b">Eş B Kişisel Sermaye / Katkı Payı (Miras, Evlilik Öncesi Varlık) (₺)</label>
            <input type="number" id="hc-mp-katki-b" placeholder="Örn: Eş B'nin altınları / birikimleri" min="0" value="0">
        </div>
        <button class="hc-btn" onclick="hcMalPaylasimiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-mp-result">
            <h4>Mal Paylaşım Tablosu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Brüt Edinilmiş Mal Varlığı</td>
                        <td id="hc-mp-res-brut">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Toplam Borçlar ve Kişisel Katkılar</td>
                        <td id="hc-mp-res-indirim">0 ₺</td>
                    </tr>
                    <tr style="font-weight:bold; color:var(--hc-front-green);">
                        <td>Paylaşılacak Net Değer (Artık Değer)</td>
                        <td id="hc-mp-res-net">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Eş A'nın Tasfiye Alacağı (1/2 Pay + Kişisel Katkı)</td>
                        <td id="hc-mp-res-pay-a" style="font-weight:bold; color:var(--hc-front-blue);">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Eş B'nin Tasfiye Alacağı (1/2 Pay + Kişisel Katkı)</td>
                        <td id="hc-mp-res-pay-b" style="font-weight:bold; color:var(--hc-front-blue);">0 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}