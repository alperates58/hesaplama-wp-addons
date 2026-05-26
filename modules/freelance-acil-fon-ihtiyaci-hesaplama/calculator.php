<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_freelance_acil_fon_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-freelance-acil-fon',
        HC_PLUGIN_URL . 'modules/freelance-acil-fon-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-freelance-acil-fon-css',
        HC_PLUGIN_URL . 'modules/freelance-acil-fon-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-freelance-acil-fon-hesaplama">
        <h3>Freelance Acil Fon İhtiyacı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-faf-kisisel">Aylık Temel Kişisel Yaşam Gideri (Kira, mutfak vb.) (₺)</label>
            <input type="number" id="hc-faf-kisisel" placeholder="Örn: 25000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-faf-sirket">Aylık İş / Şirket Giderleri (Muhasebe, lisans, vergi vb.) (₺)</label>
            <input type="number" id="hc-faf-sirket" placeholder="Örn: 8000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-faf-oran">Gelir Güvensizliği Seviyesi (Freelance Risk Derecesi)</label>
            <select id="hc-faf-oran">
                <option value="3" selected>Düşük Risk (3 Aylık Koruma - Düzenli Müşteriler Var)</option>
                <option value="6">Orta Risk (6 Aylık Koruma - Tipik Freelancer Modeli)</option>
                <option value="9">Yüksek Risk (9 Aylık Koruma - Tek Tük veya Proje Bazlı İşler)</option>
                <option value="12">Çok Yüksek Risk (12 Aylık Koruma - Yeni Başlayanlar)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcFreelanceAcilFonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-faf-result">
            <h4>Önerilen Acil Durum Fonu Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Aylık Toplam Asgari Gideriniz</td>
                        <td id="hc-faf-res-aylik" style="font-weight:bold;">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Önerilen Koruma Süresi</td>
                        <td id="hc-faf-res-sure" style="font-weight:bold;">6 Ay</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Hedeflenen Toplam Acil Durum Fonu Tutarı</td>
                        <td id="hc-faf-res-toplam">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}