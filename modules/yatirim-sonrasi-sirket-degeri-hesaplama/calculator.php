<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yatirim_sonrasi_sirket_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sirket-degerleme',
        HC_PLUGIN_URL . 'modules/yatirim-sonrasi-sirket-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sirket-degerleme-css',
        HC_PLUGIN_URL . 'modules/yatirim-sonrasi-sirket-degeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yatirim-sonrasi-sirket-degeri-hesaplama">
        <h3>Yatırım Sonrası Şirket Değeri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ysd-tutar">Alınan Yatırım Tutarı (₺ veya $)</label>
            <input type="number" id="hc-ysd-tutar" placeholder="Örn: 200000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ysd-hisse">Yatırımcıya Verilen Hisse Oranı (%)</label>
            <input type="number" id="hc-ysd-hisse" placeholder="Örn: 10" step="any" min="0.01" max="99.99">
        </div>
        <button class="hc-btn" onclick="hcSirketDegerlemeHesapla()">Değerlemeyi Hesapla</button>
        <div class="hc-result" id="hc-ysd-result">
            <h4>Değerleme Analiz Sonuçları:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Yatırım Sonrası Değer (Post-Money Valuation)</td>
                        <td id="hc-ysd-res-post">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Yatırım Öncesi Değer (Pre-Money Valuation)</td>
                        <td id="hc-ysd-res-pre">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}