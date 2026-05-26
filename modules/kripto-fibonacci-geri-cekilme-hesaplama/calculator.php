<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_fibonacci_geri_cekilme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-fibonacci',
        HC_PLUGIN_URL . 'modules/kripto-fibonacci-geri-cekilme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-fibonacci-css',
        HC_PLUGIN_URL . 'modules/kripto-fibonacci-geri-cekilme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-fibonacci-geri-cekilme-hesaplama">
        <h3>Kripto Fibonacci Geri Çekilme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kfg-high">Tepe Fiyatı (High)</label>
            <input type="number" id="hc-kfg-high" placeholder="Örn: 2000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kfg-low">Dip Fiyatı (Low)</label>
            <input type="number" id="hc-kfg-low" placeholder="Örn: 1000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kfg-trend">Trend Yönü</label>
            <select id="hc-kfg-trend">
                <option value="up" selected>Yükseliş Trendi (Geri Çekilme Seviyeleri)</option>
                <option value="down">Düşüş Trendi (Tepki Seviyeleri)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKriptoFibonacciHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kfg-result">
            <h4>Fibonacci Seviyeleri Raporu:</h4>
            <table>
                <thead>
                    <tr>
                        <th>Seviye</th>
                        <th>Fiyat Değeri</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0.0% (Başlangıç)</td>
                        <td id="hc-kfg-res-0" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>23.6% (Hafif Düzeltme)</td>
                        <td id="hc-kfg-res-236" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>38.2% (Orta Düzeltme)</td>
                        <td id="hc-kfg-res-382" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>50.0% (Psikolojik Seviye)</td>
                        <td id="hc-kfg-res-500" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="color:var(--hc-front-green);">
                        <td>61.8% (Altın Oran / Golden Ratio)</td>
                        <td id="hc-kfg-res-618" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>78.6% (Derin Düzeltme)</td>
                        <td id="hc-kfg-res-786" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>100.0% (Tam Geri Çekilme)</td>
                        <td id="hc-kfg-res-100" style="font-weight:bold;">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}