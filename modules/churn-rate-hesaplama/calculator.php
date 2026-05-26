<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_churn_rate_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-churn-rate',
        HC_PLUGIN_URL . 'modules/churn-rate-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-churn-rate-css',
        HC_PLUGIN_URL . 'modules/churn-rate-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-churn-rate-hesaplama">
        <h3>Churn Rate Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cr-baslangic">Dönem Başlangıcındaki Toplam Abone Sayısı</label>
            <input type="number" id="hc-cr-baslangic" placeholder="Örn: 1000" step="1" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-cr-ayrilan">Dönem İçinde Kaybedilen (Ayrılan) Abone Sayısı</label>
            <input type="number" id="hc-cr-ayrilan" placeholder="Örn: 50" step="1" min="0">
        </div>
        <button class="hc-btn" onclick="hcChurnRateHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cr-result">
            <h4>Müşteri Kayıp Analizi:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-red);">
                        <td>Kayıp Oranı (Churn Rate)</td>
                        <td id="hc-cr-res-oran">%0.00</td>
                    </tr>
                    <tr>
                        <td>Müşteri Elde Tutma Oranı (Retention Rate)</td>
                        <td id="hc-cr-res-retention" style="font-weight:bold; color:var(--hc-front-green);">%100.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}