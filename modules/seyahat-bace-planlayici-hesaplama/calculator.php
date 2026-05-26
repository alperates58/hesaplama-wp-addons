<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_seyahat_bace_planlayici_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-travel-budget',
        HC_PLUGIN_URL . 'modules/seyahat-bace-planlayici-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-travel-budget-css',
        HC_PLUGIN_URL . 'modules/seyahat-bace-planlayici-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-seyahat-bace-planlayici-hesaplama">
        <h3>Seyahat Bütçe Planlayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-sbp-gun">Seyahat Süresi (Gün)</label>
            <input type="number" id="hc-sbp-gun" value="7" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-sbp-ulasim">Ulaşım Gideri (Uçak, Tren vb. Biletler Toplamı - ₺)</label>
            <input type="number" id="hc-sbp-ulasim" value="8500" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-sbp-otel">Günlük Konaklama Maliyeti (Otel / Yurt - ₺)</label>
            <input type="number" id="hc-sbp-otel" value="2500" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-sbp-yasam">Günlük Yemek & Eğlence Harcaması (₺)</label>
            <input type="number" id="hc-sbp-yasam" value="1500" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-sbp-vize">Vize, Sigorta & Harç Giderleri (₺)</label>
            <input type="number" id="hc-sbp-vize" value="5000" min="0">
        </div>
        <button class="hc-btn" onclick="hcSeyahatButceHesapla()">Bütçe Analizini Yap</button>
        
        <div class="hc-result" id="hc-sbp-result">
            <h4>Bütçe Planlama Özeti:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Konaklama Maliyeti</td>
                        <td id="hc-sbp-res-otel">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Toplam Yeme-İçme / Yaşam Maliyeti</td>
                        <td id="hc-sbp-res-yasam">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Seyahat Bütçesi</td>
                        <td id="hc-sbp-res-toplam">0.00 ₺</td>
                    </tr>
                    <tr style="font-weight:bold;">
                        <td>Günlük Ortalama Maliyet (Sabitler Dahil)</td>
                        <td id="hc-sbp-res-gunluk">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}