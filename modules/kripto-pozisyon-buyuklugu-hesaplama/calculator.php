<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_pozisyon_buyuklugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-pozisyon-buyuklugu',
        HC_PLUGIN_URL . 'modules/kripto-pozisyon-buyuklugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-pozisyon-buyuklugu-css',
        HC_PLUGIN_URL . 'modules/kripto-pozisyon-buyuklugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-pozisyon-buyuklugu-hesaplama">
        <h3>Kripto Pozisyon Büyüklüğü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kpb-bakiye">Hesap Bakiyesi / Toplam Kasa ($ veya ₺)</label>
            <input type="number" id="hc-kpb-bakiye" placeholder="Örn: 10000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kpb-risk">Risk Oranı (% Kasa Kaybı)</label>
            <input type="number" id="hc-kpb-risk" placeholder="Örn: 1" step="any" min="0" max="100" value="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-kpb-giris">Giriş Fiyatı ($ veya ₺)</label>
            <input type="number" id="hc-kpb-giris" placeholder="Örn: 50" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kpb-stop">Stop Loss Fiyatı ($ veya ₺)</label>
            <input type="number" id="hc-kpb-stop" placeholder="Örn: 48" step="any" min="0">
        </div>
        <button class="hc-btn" onclick="hcKriptoPozisyonBuyukluguHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kpb-result">
            <h4>Pozisyon Büyüklüğü Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Riske Edilen Tutar (Kayıp Limiti)</td>
                        <td id="hc-kpb-res-risk-tutar" style="font-weight:bold; color:var(--hc-front-red);">0.00</td>
                    </tr>
                    <tr>
                        <td>Birim Başına Risk (Stop Mesafesi)</td>
                        <td id="hc-kpb-res-mesafe" style="font-weight:bold;">0.00 (%0.00)</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Pozisyon Büyüklüğü (Tutar)</td>
                        <td id="hc-kpb-res-poz-tutar">0.00</td>
                    </tr>
                    <tr>
                        <td>Pozisyon Büyüklüğü (Varlık Adeti)</td>
                        <td id="hc-kpb-res-poz-adet" style="font-weight:bold;">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}