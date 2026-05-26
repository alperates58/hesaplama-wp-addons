<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_temettu_buyume_modeli_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gordon-growth',
        HC_PLUGIN_URL . 'modules/temettu-buyume-modeli-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gordon-growth-css',
        HC_PLUGIN_URL . 'modules/temettu-buyume-modeli-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-temettu-buyume-modeli-hesaplama">
        <h3>Gordon Temettü Büyüme Modeli</h3>
        <div class="hc-form-group">
            <label for="hc-tbm-d0">Hisse Başına Dağıtılan Son Temettü (D₀ - ₺)</label>
            <input type="number" id="hc-tbm-d0" value="5" min="0.1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-tbm-growth">Beklenen Yıllık Temettü Büyüme Hızı (g - %)</label>
            <input type="number" id="hc-tbm-growth" value="8" min="0" max="99" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-tbm-discount">Yatırımcı Beklenen Getiri Oranı / İskonto Hızı (r - %)</label>
            <input type="number" id="hc-tbm-discount" value="12" min="1" max="99" step="any">
        </div>
        <button class="hc-btn" onclick="hcGordonHesapla()">Hisse Adil Değerini Hesapla</button>
        
        <div class="hc-result" id="hc-tbm-result">
            <h4>Değerleme Analiz Kartı:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Gelecek Yıl Beklenen Temettü (D₁)</td>
                        <td id="hc-tbm-res-d1">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Hisse Senedi Adil İçsel Değeri</td>
                        <td id="hc-tbm-res-deger">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Bilgi / Kriter Koşulu</td>
                        <td id="hc-tbm-res-bilgi">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}