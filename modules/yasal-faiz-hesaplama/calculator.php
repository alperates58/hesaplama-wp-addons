<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yasal_faiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yasal-faiz',
        HC_PLUGIN_URL . 'modules/yasal-faiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yasal-faiz-css',
        HC_PLUGIN_URL . 'modules/yasal-faiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yasal-faiz-hesaplama">
        <h3>Yasal Faiz Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yf-anapara">Alacak / Anapara Tutarı (₺)</label>
            <input type="number" id="hc-yf-anapara" placeholder="Örn: 50000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-yf-baslangic">Faiz Başlangıç Tarihi</label>
            <input type="date" id="hc-yf-baslangic">
        </div>
        <div class="hc-form-group">
            <label for="hc-yf-bitis">Faiz Bitiş / Hesaplama Tarihi</label>
            <input type="date" id="hc-yf-bitis">
        </div>
        <button class="hc-btn" onclick="hcYasalFaizHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yf-result">
            <h4>Hesaplanan Yasal Faiz Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Faize Esas Anapara</td>
                        <td id="hc-yf-res-anapara">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Günlük Yasal Faiz Oranı (Yıllık %24)</td>
                        <td>%0.06575</td>
                    </tr>
                    <tr>
                        <td>Geçen Gün Sayısı</td>
                        <td id="hc-yf-res-gun">0 Gün</td>
                    </tr>
                    <tr>
                        <td>Biriken Faiz Tutarı</td>
                        <td id="hc-yf-res-faiz" style="color:var(--hc-front-green); font-weight:bold;">0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Toplam Alacak (Anapara + Faiz)</td>
                        <td id="hc-yf-res-toplam">0 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}