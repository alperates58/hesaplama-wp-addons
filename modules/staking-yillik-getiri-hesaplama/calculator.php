<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_staking_yillik_getiri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-staking-yillik-getiri',
        HC_PLUGIN_URL . 'modules/staking-yillik-getiri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-staking-yillik-getiri-css',
        HC_PLUGIN_URL . 'modules/staking-yillik-getiri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-staking-yillik-getiri-hesaplama">
        <h3>Staking Yıllık Getiri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-syg-miktar">Stake Edilen Kripto Para Miktarı</label>
            <input type="number" id="hc-syg-miktar" placeholder="Örn: 10" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-syg-oran">Yıllık Getiri Oranı (APR/APY) (%)</label>
            <input type="number" id="hc-syg-oran" placeholder="Örn: 8.5" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-syg-sure">Kilit Süresi (Gün)</label>
            <input type="number" id="hc-syg-sure" placeholder="Örn: 90" min="1" value="90">
        </div>
        <button class="hc-btn" onclick="hcStakingYillikGetiriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-syg-result">
            <h4>Staking Kazanç Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Stake Edilen Anapara</td>
                        <td id="hc-syg-res-anapara" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="color:var(--hc-front-green); font-size:16px; font-weight:bold;">
                        <td>Kilit Sonundaki Net Staking Ödülü</td>
                        <td id="hc-syg-res-odul">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Toplam Varlık Değeri (Vade Sonu)</td>
                        <td id="hc-syg-res-toplam">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}