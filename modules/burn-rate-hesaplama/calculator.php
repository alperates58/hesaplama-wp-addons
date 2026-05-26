<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burn_rate_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burn-rate',
        HC_PLUGIN_URL . 'modules/burn-rate-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burn-rate-css',
        HC_PLUGIN_URL . 'modules/burn-rate-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burn-rate-hesaplama">
        <h3>Burn Rate Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-br-baslangic">Dönem Başlangıcı Nakit Bakiyesi (₺ veya $)</label>
            <input type="number" id="hc-br-baslangic" placeholder="Örn: 600000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-br-bitis">Dönem Bitişi Nakit Bakiyesi (₺ veya $)</label>
            <input type="number" id="hc-br-bitis" placeholder="Örn: 450000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-br-ay">Geçen Süre (Ay)</label>
            <input type="number" id="hc-br-ay" placeholder="Örn: 3" step="1" min="1" value="3">
        </div>
        <div class="hc-form-group">
            <label for="hc-br-brut-aylik">Ortalama Aylık Brüt Giderler (İsteğe Bağlı) (₺ veya $)</label>
            <input type="number" id="hc-br-brut-aylik" placeholder="Örn: 80000" step="any" min="0" value="0">
        </div>
        <button class="hc-btn" onclick="hcBurnRateHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-br-result">
            <h4>Burn Rate Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Nakit Azalışı (Dönemsel)</td>
                        <td id="hc-br-res-toplam-azalis" style="font-weight:bold; color:var(--hc-front-red);">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-red);">
                        <td>Aylık Net Burn Rate (Ortalama)</td>
                        <td id="hc-br-res-net-burn">0.00</td>
                    </tr>
                    <tr>
                        <td>Aylık Brüt Burn Rate</td>
                        <td id="hc-br-res-brut-burn" style="font-weight:bold;">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}