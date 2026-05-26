<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_temettu_getiri_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-div-yield',
        HC_PLUGIN_URL . 'modules/temettu-getiri-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-div-yield-css',
        HC_PLUGIN_URL . 'modules/temettu-getiri-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-temettu-getiri-orani-hesaplama">
        <h3>Temettü Getiri Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tgo-hisse">Hisse Senedi Cari Fiyatı (₺)</label>
            <input type="number" id="hc-tgo-hisse" placeholder="Örn: 120" min="0.1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-tgo-tutar">Hisse Başına Brüt Yıllık Temettü Tutarı (₺)</label>
            <input type="number" id="hc-tgo-tutar" placeholder="Örn: 8.5" min="0.01" step="any">
        </div>
        <button class="hc-btn" onclick="hcTemettuGetiriHesapla()">Temettü Verimini Hesapla</button>
        
        <div class="hc-result" id="hc-tgo-result">
            <h4>Temettü Getirisi Analiz Raporu:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Brüt Temettü Verimi (Yield)</td>
                        <td id="hc-tgo-res-verim">%0.00</td>
                    </tr>
                    <tr>
                        <td>Net Temettü Verimi (%10 Stopaj Kesintili)</td>
                        <td id="hc-tgo-res-net-verim">%0.00</td>
                    </tr>
                    <tr>
                        <td>Temettü Verim Sınıflandırması</td>
                        <td id="hc-tgo-res-sinif">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}