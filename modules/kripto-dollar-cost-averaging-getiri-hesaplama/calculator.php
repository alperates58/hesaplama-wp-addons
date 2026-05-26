<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_dollar_cost_averaging_getiri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-dca-getiri',
        HC_PLUGIN_URL . 'modules/kripto-dollar-cost-averaging-getiri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-dca-getiri-css',
        HC_PLUGIN_URL . 'modules/kripto-dollar-cost-averaging-getiri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-dollar-cost-averaging-getiri-hesaplama">
        <h3>Kripto Dollar Cost Averaging Getiri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kdg-tutar">Periyodik Yatırım Tutarı ($ veya ₺)</label>
            <input type="number" id="hc-kdg-tutar" placeholder="Örn: 100" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kdg-sıklık">Yatırım Sıklığı</label>
            <select id="hc-kdg-sıklık">
                <option value="52">Haftalık (Yılda 52 Kez)</option>
                <option value="12" selected>Aylık (Yılda 12 Kez)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-kdg-yil">Yatırım Süresi (Yıl)</label>
            <input type="number" id="hc-kdg-yil" placeholder="Örn: 3" min="1" value="3">
        </div>
        <div class="hc-form-group">
            <label for="hc-kdg-artis">Beklenen Yıllık Fiyat Artışı (%)</label>
            <input type="number" id="hc-kdg-artis" placeholder="Örn: 30" min="-99" value="30">
        </div>
        <button class="hc-btn" onclick="hcKriptoDcaGetiriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kdg-result">
            <h4>DCA Getiri Projeksiyonu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Yatırılan Tutar</td>
                        <td id="hc-kdg-res-toplam" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Tahmini Portföy Değeri</td>
                        <td id="hc-kdg-res-deger" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Tahmini Net Getiri / Kar</td>
                        <td id="hc-kdg-res-kar">0.00</td>
                    </tr>
                    <tr>
                        <td>Toplam Getiri Oranı (ROI)</td>
                        <td id="hc-kdg-res-roi" style="font-weight:bold;">%0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}