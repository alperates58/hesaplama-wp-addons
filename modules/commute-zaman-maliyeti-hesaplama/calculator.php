<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_commute_zaman_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-commute-zaman',
        HC_PLUGIN_URL . 'modules/commute-zaman-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-commute-zaman-css',
        HC_PLUGIN_URL . 'modules/commute-zaman-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-commute-zaman-maliyeti-hesaplama">
        <h3>Commute Zaman Maliyeti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-czm-tek-yon">Tek Yön Yolculuk Süresi (Dakika)</label>
            <input type="number" id="hc-czm-tek-yon" placeholder="Örn: 45" step="1" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-czm-gun">Haftada Kaç Gün İşe Gidiyorsunuz?</label>
            <input type="number" id="hc-czm-gun" placeholder="Örn: 5" step="1" min="1" max="7" value="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-czm-maas">Aylık Net Maaşınız (veya Hedef Geliriniz) (₺)</label>
            <input type="number" id="hc-czm-maas" placeholder="Örn: 40000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-czm-calisma-saat">Aylık Toplam Çalışma Süreniz (Saat)</label>
            <input type="number" id="hc-czm-calisma-saat" placeholder="Örn: 180" step="any" min="1" value="180">
        </div>
        <button class="hc-btn" onclick="hcCommuteZamanHesapla()">Zaman Maliyetini Hesapla</button>
        <div class="hc-result" id="hc-czm-result">
            <h4>Commute Zaman Kaybı Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Aylık Yolda Geçen Süre</td>
                        <td id="hc-czm-res-aylik-saat" style="font-weight:bold;">0 Saat</td>
                    </tr>
                    <tr>
                        <td>Yıllık Yolda Geçen Süre</td>
                        <td id="hc-czm-res-yillik-saat" style="font-weight:bold;">0 Saat</td>
                    </tr>
                    <tr>
                        <td>Sizin Saatlik Değeriniz</td>
                        <td id="hc-czm-res-saatlik" style="font-weight:bold;">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-red);">
                        <td>Yıllık Commute Zaman Maliyeti (Kayıp Değer)</td>
                        <td id="hc-czm-res-yillik-maliyet">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}