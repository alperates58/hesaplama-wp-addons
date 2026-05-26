<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_satin_alma_gucu_paritesi_maas_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ppp-maas',
        HC_PLUGIN_URL . 'modules/satin-alma-gucu-paritesi-maas-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ppp-maas-css',
        HC_PLUGIN_URL . 'modules/satin-alma-gucu-paritesi-maas-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-satin-alma-gucu-paritesi-maas-hesaplama">
        <h3>Satın Alma Gücü Paritesi Maaş Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ppp-maas-val">Teklif Edilen Yabancı Maaş (Yıllık veya Aylık)</label>
            <input type="number" id="hc-ppp-maas-val" placeholder="Örn: 5000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ppp-hedef-ulke">Teklif Veren Ülke (Baz Ülke)</label>
            <select id="hc-ppp-hedef-ulke">
                <option value="1.0" selected>ABD ($) - Ref: 1.0</option>
                <option value="0.92">Almanya (€) - Ref: 0.92</option>
                <option value="0.80">İngiltere (£) - Ref: 0.80</option>
                <option value="1.45">Kanada ($) - Ref: 1.45</option>
                <option value="1.52">Avustralya ($) - Ref: 1.52</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ppp-turkiye-ref">Türkiye Satın Alma Gücü Katsayısı (PPP/TRY Projeksiyonu)</label>
            <input type="number" id="hc-ppp-turkiye-ref" placeholder="Örn: 0.38" step="any" min="0.01" value="0.38">
            <p style="font-size:11px; color:#64748b;">(Not: Bu katsayı Türkiye'deki hizmet ve ürün fiyatlarının ABD'ye oranını temsil eder. Düşük olması satın alma gücünüzün yerelde daha yüksek olacağı anlamına gelir.)</p>
        </div>
        <div class="hc-form-group">
            <label for="hc-ppp-kur">Döviz Kuru (Örn: USD/TRY)</label>
            <input type="number" id="hc-ppp-kur" placeholder="Örn: 33.50" step="any" min="0.1" value="33.50">
        </div>
        <button class="hc-btn" onclick="hcPppMaasHesapla()">Refah Karşılığını Hesapla</button>
        <div class="hc-result" id="hc-ppp-result">
            <h4>Satın Alma Gücü Analizi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Nominal Maaş Karşılığı (Düz Kur Çevirisi)</td>
                        <td id="hc-ppp-res-nominal" style="font-weight:bold; color:var(--hc-front-blue-dark);">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>PPP Refah Değeri (Türkiye Satın Alma Gücü Karşılığı)</td>
                        <td id="hc-ppp-res-refah">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Yerel Satın Alma Gücü Çarpanı</td>
                        <td id="hc-ppp-res-carpan" style="font-weight:bold;">2.63x</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}