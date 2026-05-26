<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_risk_odul_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-risk-odul-orani',
        HC_PLUGIN_URL . 'modules/kripto-risk-odul-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-risk-odul-orani-css',
        HC_PLUGIN_URL . 'modules/kripto-risk-odul-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-risk-odul-orani-hesaplama">
        <h3>Kripto Risk Ödül Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-roo-giris">Giriş Fiyatı</label>
            <input type="number" id="hc-roo-giris" placeholder="Örn: 100" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-roo-hedef">Kar Al (Take Profit) Fiyatı</label>
            <input type="number" id="hc-roo-hedef" placeholder="Örn: 130" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-roo-stop">Stop Loss Fiyatı</label>
            <input type="number" id="hc-roo-stop" placeholder="Örn: 90" step="any" min="0">
        </div>
        <button class="hc-btn" onclick="hcKriptoRiskOdulOraniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-roo-result">
            <h4>Risk Ödül Analizi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Hedeflenen Kar (Ödül)</td>
                        <td id="hc-roo-res-odul" style="color:var(--hc-front-green); font-weight:bold;">0.00 (%0.00)</td>
                    </tr>
                    <tr>
                        <td>Potansiyel Zarar (Risk)</td>
                        <td id="hc-roo-res-risk" style="color:var(--hc-front-red); font-weight:bold;">0.00 (%0.00)</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Risk Ödül Oranı (R:R Ratio)</td>
                        <td id="hc-roo-res-ratio">1 : 0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}