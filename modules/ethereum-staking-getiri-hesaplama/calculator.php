<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ethereum_staking_getiri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ethereum-staking',
        HC_PLUGIN_URL . 'modules/ethereum-staking-getiri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ethereum-staking-css',
        HC_PLUGIN_URL . 'modules/ethereum-staking-getiri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ethereum-staking-getiri-hesaplama">
        <h3>Ethereum Staking Getiri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-esg-miktar">Stake Edilecek ETH Miktarı (Min: 0.1, Önerilen: 32)</label>
            <input type="number" id="hc-esg-miktar" placeholder="Örn: 32" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-esg-oran">Ağ Yıllık Ödül Oranı (APY) (%)</label>
            <input type="number" id="hc-esg-oran" placeholder="Örn: 3.8" step="any" min="0" value="3.8">
        </div>
        <button class="hc-btn" onclick="hcEthereumStakingGetiriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-esg-result">
            <h4>Staking Ödülleri Tahmin Tablosu:</h4>
            <table>
                <thead>
                    <tr>
                        <th>Dönem</th>
                        <th>ETH Kazancı</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Günlük</td>
                        <td id="hc-esg-res-gun" style="font-weight:bold;">0.000000 ETH</td>
                    </tr>
                    <tr>
                        <td>Haftalık</td>
                        <td id="hc-esg-res-hafta" style="font-weight:bold;">0.000000 ETH</td>
                    </tr>
                    <tr>
                        <td>Aylık (30 Gün)</td>
                        <td id="hc-esg-res-ay" style="font-weight:bold;">0.000000 ETH</td>
                    </tr>
                    <tr style="color:var(--hc-front-green); font-size:16px; font-weight:bold;">
                        <td>Yıllık (365 Gün)</td>
                        <td id="hc-esg-res-yil">0.000000 ETH</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}