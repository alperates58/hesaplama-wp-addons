<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ogrenci_vizesi_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-student-visa',
        HC_PLUGIN_URL . 'modules/ogrenci-vizesi-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-student-visa-css',
        HC_PLUGIN_URL . 'modules/ogrenci-vizesi-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ogrenci-vizesi-maliyet-hesaplama">
        <h3>Öğrenci Vizesi Maliyet Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ovm-ulke">Hedef Ülke / Vize Türü</label>
            <select id="hc-ovm-ulke" onchange="hcOvmUlkeDegisti()">
                <option value="almanya" selected>Almanya (Ulusal Vize - Bloke Hesaplı)</option>
                <option value="ingiltere">İngiltere (Student Visa - Harç + Sağlık Artırımı)</option>
                <option value="usa">Amerika Birleşik Devletleri (F-1 Vizesi / SEVIS)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ovm-bloke">Bloke Hesap / Finansal Teminat Gereksinimi (Döviz)</label>
            <input type="number" id="hc-ovm-bloke" value="11904" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ovm-harc">Vize Harcı ve İşlem Ücretleri (Döviz)</label>
            <input type="number" id="hc-ovm-harc" value="75" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ovm-sigorta">Zorunlu Sağlık Sigortası Maliyeti (Yıllık - Döviz)</label>
            <input type="number" id="hc-ovm-sigorta" value="150" min="0">
        </div>
        <button class="hc-btn" onclick="hcOvmHesapla()">Gereksinimleri Listele</button>
        
        <div class="hc-result" id="hc-ovm-result">
            <h4>Vize Finansal Gereksinim Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Vize Başvuru Süreci Net Masrafları (TL)</td>
                        <td id="hc-ovm-res-proses-tl">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Banka Hesabında Gösterilecek Minimum Tutar (Bloke)</td>
                        <td id="hc-ovm-res-gosterilecek">0.00</td>
                    </tr>
                    <tr>
                        <td>Detaylar & Açıklama</td>
                        <td id="hc-ovm-res-detay">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}