<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_musteri_basina_karlilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-musteri-karlilik',
        HC_PLUGIN_URL . 'modules/musteri-basina-karlilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-musteri-karlilik-css',
        HC_PLUGIN_URL . 'modules/musteri-basina-karlilik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-musteri-basina-karlilik-hesaplama">
        <h3>Müşteri Başına Karlılık Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mbk-gelir">Müşteriden Kazanılan Toplam Gelir (₺ veya $)</label>
            <input type="number" id="hc-mbk-gelir" placeholder="Örn: 20000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mbk-saat">Müşteriye Harcanan Toplam Zaman (Saat)</label>
            <input type="number" id="hc-mbk-saat" placeholder="Örn: 30" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mbk-saat-maliyet">Kendi Saatlik Zaman Maliyetiniz (₺ veya $)</label>
            <input type="number" id="hc-mbk-saat-maliyet" placeholder="Örn: 400" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mbk-gider">Diğer Proje Giderleri (Sunucu, üçüncü taraf ödemeler vb.)</label>
            <input type="number" id="hc-mbk-gider" placeholder="Örn: 1500" step="any" min="0" value="0">
        </div>
        <button class="hc-btn" onclick="hcMusteriKarlilikHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-mbk-result">
            <h4>Karlılık Analiz Sonuçları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Efor Maliyeti (Zaman x Maliyet)</td>
                        <td id="hc-mbk-res-efor" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Müşteri Bazlı Toplam Maliyet</td>
                        <td id="hc-mbk-res-toplam-maliyet" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold;">
                        <td>Net Kar / Zarar</td>
                        <td id="hc-mbk-res-net">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Net Kar Marjı (%)</td>
                        <td id="hc-mbk-res-marj">%0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}