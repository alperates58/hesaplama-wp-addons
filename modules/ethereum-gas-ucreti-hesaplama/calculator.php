<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ethereum_gas_ucreti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ethereum-gas-ucreti',
        HC_PLUGIN_URL . 'modules/ethereum-gas-ucreti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ethereum-gas-ucreti-css',
        HC_PLUGIN_URL . 'modules/ethereum-gas-ucreti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ethereum-gas-ucreti-hesaplama">
        <h3>Ethereum Gas Ücreti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-egu-limit">İşlem Limit Değeri (Gas Limit)</label>
            <select id="hc-egu-limit">
                <option value="21000" selected>Standart ETH Transferi (21,000 Gas)</option>
                <option value="65000">ERC-20 Token Transferi (~65,000 Gas)</option>
                <option value="150000">Uniswap Swap İşlemi (~150,000 Gas)</option>
                <option value="250000">NFT Mint / Akıllı Sözleşme (~250,000 Gas)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-egu-gwei">Gas Fiyatı (Gwei)</label>
            <input type="number" id="hc-egu-gwei" placeholder="Örn: 25" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-egu-eth">ETH Fiyatı ($)</label>
            <input type="number" id="hc-egu-eth" placeholder="Örn: 3500" step="any" min="0" value="3500">
        </div>
        <button class="hc-btn" onclick="hcEthereumGasUcretiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-egu-result">
            <h4>Tahmini Gas Ücreti:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Hesaplanan Toplam Gas</td>
                        <td id="hc-egu-res-limit" style="font-weight:bold;">21,000</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Gas Ücreti (ETH)</td>
                        <td id="hc-egu-res-eth">0.0000 ETH</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Gas Ücreti (USD)</td>
                        <td id="hc-egu-res-usd">0.00 $</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}