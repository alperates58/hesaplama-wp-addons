<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kombucha_seker_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kombucha',
        HC_PLUGIN_URL . 'modules/kombucha-seker-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kombucha-css',
        HC_PLUGIN_URL . 'modules/kombucha-seker-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kombucha-seker-orani-hesaplama">
        <h3>Kombucha Şeker & Kalori Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kom-hacim">Kombucha Toplam Sıvı Hacmi (Litre)</label>
            <input type="number" id="hc-kom-hacim" value="3" min="0.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-kom-baslangic">Litre Başına Başlangıç Şekeri (g / L)</label>
            <input type="number" id="hc-kom-baslangic" value="80" min="40">
        </div>
        <div class="hc-form-group">
            <label for="hc-kom-gun">Fermantasyon Süresi (Gün)</label>
            <input type="number" id="hc-kom-gun" value="10" min="1" max="60">
        </div>
        <div class="hc-form-group">
            <label for="hc-kom-isi">Ortalama Fermantasyon Sıcaklığı (°C)</label>
            <input type="number" id="hc-kom-isi" value="24" min="15" max="35">
        </div>
        <button class="hc-btn" onclick="hcKombuchaHesapla()">Fermantasyon Durumunu Analiz Et</button>
        
        <div class="hc-result" id="hc-kom-result">
            <h4>Fermantasyon Sonucu Tahmini:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Litre Başı Kalan Şeker</td>
                        <td id="hc-kom-res-seker-litre">0.0 g / L</td>
                    </tr>
                    <tr>
                        <td>Toplam Kalan Şeker (Kavanoz)</td>
                        <td id="hc-kom-res-seker-top">0.0 g</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Tahmini Kalori (250 ml Bardak)</td>
                        <td id="hc-kom-res-kalori">0 kcal</td>
                    </tr>
                    <tr>
                        <td>Lezzet Profili Yorumu</td>
                        <td id="hc-kom-res-tat" style="font-weight:bold;">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}