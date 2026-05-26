<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ltv_cac_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ltv-cac',
        HC_PLUGIN_URL . 'modules/ltv-cac-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ltv-cac-css',
        HC_PLUGIN_URL . 'modules/ltv-cac-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ltv-cac-orani-hesaplama">
        <h3>LTV CAC Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ltv-arpu">Abone Başına Aylık Ortalama Gelir (ARPU) (₺ veya $)</label>
            <input type="number" id="hc-ltv-arpu" placeholder="Örn: 150" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ltv-churn">Aylık Churn (Abonelikten Ayrılma) Oranı (%)</label>
            <input type="number" id="hc-ltv-churn" placeholder="Örn: 5" step="any" min="0.01" max="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-ltv-cac">Müşteri Edinme Maliyeti (CAC) (₺ veya $)</label>
            <input type="number" id="hc-ltv-cac" placeholder="Örn: 600" step="any" min="0">
        </div>
        <button class="hc-btn" onclick="hcLtvCacHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-ltv-result">
            <h4>Pazarlama ve Birim Ekonomi Analizi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Müşteri Yaşam Boyu Değeri (LTV)</td>
                        <td id="hc-ltv-res-ltv" style="font-weight:bold; color:var(--hc-front-blue-dark);">0.00</td>
                    </tr>
                    <tr>
                        <td>Müşteri Edinme Maliyeti (CAC)</td>
                        <td id="hc-ltv-res-cac" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold;">
                        <td>LTV : CAC Oranı</td>
                        <td id="hc-ltv-res-oran">0.00</td>
                    </tr>
                    <tr style="font-size:14px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Verimlilik Durumu</td>
                        <td id="hc-ltv-res-durum">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}