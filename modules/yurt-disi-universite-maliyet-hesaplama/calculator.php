<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yurt_disi_universite_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-overseas-uni',
        HC_PLUGIN_URL . 'modules/yurt-disi-universite-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-overseas-uni-css',
        HC_PLUGIN_URL . 'modules/yurt-disi-universite-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yurt-disi-universite-maliyet-hesaplama">
        <h3>Yurt Dışı Üniversite Maliyet Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yum-ulke">Hedef Ülke</label>
            <select id="hc-yum-ulke" onchange="hcYumUlkeDegisti()">
                <option value="usd" data-rate="45.9" selected>Amerika Birleşik Devletleri (USD - $)</option>
                <option value="gbp" data-rate="61.7">İngiltere (GBP - £)</option>
                <option value="eur" data-rate="53.4">Almanya / İtalya / AB (EUR - €)</option>
                <option value="cad" data-rate="33.2">Kanada (CAD - $)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-yum-harc">Yıllık Okul Harcı / Eğitim Ücreti (Döviz)</label>
            <input type="number" id="hc-yum-harc" value="25000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-yum-kira">Aylık Konaklama / Yurt / Kira Gideri (Döviz)</label>
            <input type="number" id="hc-yum-kira" value="1000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-yum-yasam">Aylık Yemek & Sosyal Yaşam Gideri (Döviz)</label>
            <input type="number" id="hc-yum-yasam" value="600" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-yum-sure">Eğitim Süresi (Yıl)</label>
            <input type="number" id="hc-yum-sure" value="4" min="1" max="6">
        </div>
        <button class="hc-btn" onclick="hcYumHesapla()">Toplam Maliyeti Hesapla</button>
        
        <div class="hc-result" id="hc-yum-result">
            <h4>Eğitim Maliyet Analiz Tablosu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Yıllık Toplam Maliyet (Döviz)</td>
                        <td id="hc-yum-res-yillik-doviz">0.00</td>
                    </tr>
                    <tr>
                        <td>Yıllık Toplam Maliyet (TL)</td>
                        <td id="hc-yum-res-yillik-tl">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Eğitim Boyunca Toplam Maliyet (Döviz)</td>
                        <td id="hc-yum-res-top-doviz">0.00</td>
                    </tr>
                    <tr style="font-weight:bold; color:var(--hc-front-green);">
                        <td>Eğitim Boyunca Toplam Maliyet (TL)</td>
                        <td id="hc-yum-res-top-tl">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}