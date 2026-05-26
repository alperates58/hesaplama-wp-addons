<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cocuk_nafakasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cocuk-nafakasi',
        HC_PLUGIN_URL . 'modules/cocuk-nafakasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cocuk-nafakasi-css',
        HC_PLUGIN_URL . 'modules/cocuk-nafakasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cocuk-nafakasi-hesaplama">
        <h3>Çocuk Nafakası (İştirak) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cn-odeyen-gelir">Nafaka Yükümlüsünün Aylık Net Geliri (₺)</label>
            <input type="number" id="hc-cn-odeyen-gelir" placeholder="Örn: 40000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-cn-cocuk-sayisi">Çocuk Sayısı</label>
            <select id="hc-cn-cocuk-sayisi" onchange="hcCocukGirisleriGuncelle()">
                <option value="1">1 Çocuk</option>
                <option value="2">2 Çocuk</option>
                <option value="3">3 Çocuk</option>
                <option value="4">4 Çocuk</option>
            </select>
        </div>
        
        <div id="hc-cn-cocuk-detaylari">
            <!-- Dinamik çocuk detay alanları -->
            <div class="hc-cn-cocuk-row" style="padding:10px; border:1px solid #e2e8f0; border-radius:8px; margin-bottom:10px;">
                <span style="font-weight:bold; font-size:13px; display:block; margin-bottom:6px;">1. Çocuk</span>
                <div class="hc-form-group" style="margin-bottom:6px;">
                    <label style="font-size:12px;">Yaş Grubu</label>
                    <select class="hc-cn-yas-grubu">
                        <option value="0.12">0-6 Yaş (Okul Öncesi)</option>
                        <option value="0.15">7-12 Yaş (İlkokul/Ortaokul)</option>
                        <option value="0.18">13-18 Yaş (Lise)</option>
                        <option value="0.20">18+ Yaş (Üniversite / Eğitim Devam Ediyor)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-cn-ek-gider">Çocukların Aylık Ek Eğitim / Sağlık Gideri (₺)</label>
            <input type="number" id="hc-cn-ek-gider" placeholder="Özel okul, terapi vb. (Opsiyonel)" min="0" value="0">
        </div>

        <button class="hc-btn" onclick="hcCocukNafakasiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cocuk-nafakasi-result">
            <h4>Hesaplanan İştirak Nafakası:</h4>
            <table>
                <tbody>
                    <tr>
                        <td><strong>Çocukların Yaş ve İhtiyaç Bazlı Nafakası</strong></td>
                        <td id="hc-cn-res-baz">0 ₺</td>
                    </tr>
                    <tr>
                        <td><strong>Ek Gider Katkı Payı (%50)</strong></td>
                        <td id="hc-cn-res-ek">0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Toplam Aylık İştirak Nafakası</td>
                        <td id="hc-cn-res-toplam">0 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}