<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_yillik_vergi_yukumlulugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-yillik-vergi',
        HC_PLUGIN_URL . 'modules/kripto-yillik-vergi-yukumlulugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-yillik-vergi-css',
        HC_PLUGIN_URL . 'modules/kripto-yillik-vergi-yukumlulugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-yillik-vergi-yukumlulugu-hesaplama">
        <h3>Kripto Yıllık Vergi Yükümlülüğü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yvy-kar">Yıllık Toplam Gerçekleşen Kar ($ veya ₺)</label>
            <input type="number" id="hc-yvy-kar" placeholder="Örn: 50000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-yvy-zarar">Yıllık Toplam Gerçekleşen Zarar ($ veya ₺)</label>
            <input type="number" id="hc-yvy-zarar" placeholder="Örn: 12000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-yvy-muafiyet">Yıllık Vergi Muafiyet Sınırı ($ veya ₺)</label>
            <input type="number" id="hc-yvy-muafiyet" placeholder="Örn: 3000" step="any" min="0" value="3000">
        </div>
        <div class="hc-form-group">
            <label for="hc-yvy-oran">Gelir Vergisi Oranı (%)</label>
            <input type="number" id="hc-yvy-oran" placeholder="Örn: 20" step="any" min="0" value="20">
        </div>
        <button class="hc-btn" onclick="hcKriptoYillikVergiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yvy-result">
            <h4>Yıllık Vergi Beyannamesi Projeksiyonu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Net Yıllık Kazanç (Zarar Düşülmüş)</td>
                        <td id="hc-yvy-res-net-kazanc" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Vergiye Tabi Matrah (Muafiyet Düşülmüş)</td>
                        <td id="hc-yvy-res-matrah" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-red);">
                        <td>Ödenecek Yıllık Toplam Vergi</td>
                        <td id="hc-yvy-res-vergi">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}