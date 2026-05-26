<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akvaryum_balik_yogunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-akvaryum-balik-yogunluk',
        HC_PLUGIN_URL . 'modules/akvaryum-balik-yogunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-akvaryum-balik-yogunluk-css',
        HC_PLUGIN_URL . 'modules/akvaryum-balik-yogunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-akvaryum-balik-yogunlugu-hesaplama">
        <h3>Akvaryum Balık Yoğunluğu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-aby-hacim">Akvaryum Net Su Hacmi (Litre)</label>
            <input type="number" id="hc-aby-hacim" placeholder="Örn: 120" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-aby-tur">Balık Türü Grubu</label>
            <select id="hc-aby-tur">
                <option value="kucuk">Küçük ve Uysal (Neon, Lepistes, Zebra Danios vb. - 1 cm / 1 L)</option>
                <option value="orta">Orta Boyutlu (Japon Balığı, Melek, Gourami vb. - 1 cm / 2 L)</option>
                <option value="buyuk">Büyük / Kirletici (Cichlidler, Discus, Astronot vb. - 1 cm / 4 L)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-aby-boy">Planlanan Balıkların Ortalama Yetişkin Boyu (cm)</label>
            <input type="number" id="hc-aby-boy" placeholder="Örn: 5" step="any" min="0.5">
        </div>
        <button class="hc-btn" onclick="hcBalikYogunluguHesapla()">Kapasite Hesapla</button>
        <div class="hc-result" id="hc-aby-result">
            <h4>Yoğunluk Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Balık Başına Gereken Hacim Katsayısı</td>
                        <td id="hc-aby-res-katsayi">1 cm balık boyu için 1 L</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Önerilen Maksimum Toplam Balık Boyu</td>
                        <td id="hc-aby-res-toplam-boy">0 cm</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Tahmini Güvenli Balık Sayısı</td>
                        <td id="hc-aby-res-sayi">0 adet</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}