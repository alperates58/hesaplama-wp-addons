<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gpu_mining_gunluk_kazanc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gpu-mining-kazanc',
        HC_PLUGIN_URL . 'modules/gpu-mining-gunluk-kazanc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gpu-mining-kazanc-css',
        HC_PLUGIN_URL . 'modules/gpu-mining-gunluk-kazanc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gpu-mining-gunluk-kazanc-hesaplama">
        <h3>GPU Mining Günlük Kazanç Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gmk-has">GPU Toplam Gücü (Hash Rate) (MH/s)</label>
            <input type="number" id="hc-gmk-has" placeholder="Örn: 240" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-gmk-fiyat">Coin Fiyatı ($)</label>
            <input type="number" id="hc-gmk-fiyat" placeholder="Örn: 22" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-gmk-odul">Zorluk Faktörü (Günlük Kazanç Katsayısı 100 MH/s başına Coin)</label>
            <input type="number" id="hc-gmk-odul" placeholder="Örn: 0.05" step="any" min="0" value="0.05">
        </div>
        <div class="hc-form-group">
            <label for="hc-gmk-guc">Kartların Toplam Tüketimi (Watt)</label>
            <input type="number" id="hc-gmk-guc" placeholder="Örn: 650" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-gmk-elektrik">Elektrik kWh Fiyatı (₺)</label>
            <input type="number" id="hc-gmk-elektrik" placeholder="Örn: 2.80" step="any" min="0" value="2.80">
        </div>
        <div class="hc-form-group">
            <label for="hc-gmk-kur">Dolar Kuru ($ / ₺)</label>
            <input type="number" id="hc-gmk-kur" placeholder="Örn: 33.50" step="any" min="0" value="33.50">
        </div>
        <button class="hc-btn" onclick="hcGpuMiningKazancHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gmk-result">
            <h4>Günlük Hesaplama Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Günlük Coin Kazancı</td>
                        <td id="hc-gmk-res-coin" style="font-weight:bold;">0.00 Coin</td>
                    </tr>
                    <tr>
                        <td>Günlük Brüt Gelir (USD)</td>
                        <td id="hc-gmk-res-gelir-usd" style="font-weight:bold;">0.00 $</td>
                    </tr>
                    <tr>
                        <td>Günlük Brüt Gelir (TL)</td>
                        <td id="hc-gmk-res-gelir-tl" style="font-weight:bold;">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Günlük Elektrik Gideri (TL)</td>
                        <td id="hc-gmk-res-gider-tl" style="color:var(--hc-front-red); font-weight:bold;">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold;">
                        <td>Günlük Net Kazanç (TL)</td>
                        <td id="hc-gmk-res-net-tl">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}