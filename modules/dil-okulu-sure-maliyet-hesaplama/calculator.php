<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dil_okulu_sure_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lang-school',
        HC_PLUGIN_URL . 'modules/dil-okulu-sure-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lang-school-css',
        HC_PLUGIN_URL . 'modules/dil-okulu-sure-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dil-okulu-sure-maliyet-hesaplama">
        <h3>Dil Okulu Süre Maliyet Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dos-para">Para Birimi</label>
            <select id="hc-dos-para">
                <option value="61.7" selected>İngiliz Sterlini (GBP - £)</option>
                <option value="53.4">Euro (EUR - €)</option>
                <option value="45.9">Amerikan Doları (USD - $)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-dos-hafta">Eğitim Süresi (Hafta)</label>
            <input type="number" id="hc-dos-hafta" value="12" min="1" max="52">
        </div>
        <div class="hc-form-group">
            <label for="hc-dos-egitim">Haftalık Kurs Ücreti (Döviz)</label>
            <input type="number" id="hc-dos-egitim" value="250" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-dos-yurt">Haftalık Konaklama Bedeli (Döviz)</label>
            <input type="number" id="hc-dos-yurt" value="180" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-dos-yasam">Haftalık Harçlık / Yaşam Gideri (Döviz)</label>
            <input type="number" id="hc-dos-yasam" value="100" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-dos-sabit">Vize, Uçak & Sigorta Giderleri Toplamı (TL Bazında)</label>
            <input type="number" id="hc-dos-sabit" value="35000" min="0" step="500">
        </div>
        <button class="hc-btn" onclick="hcDosHesapla()">Toplam Maliyeti Hesapla</button>
        
        <div class="hc-result" id="hc-dos-result">
            <h4>Dil Okulu Bütçe Özeti:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Haftalık Toplam Gider (Döviz)</td>
                        <td id="hc-dos-res-haftalik-doviz">0.00</td>
                    </tr>
                    <tr>
                        <td>Eğitim & Yaşam Toplamı (Döviz)</td>
                        <td id="hc-dos-res-top-doviz">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Maliyet (TL - Sabit Giderler Dahil)</td>
                        <td id="hc-dos-res-top-tl">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}