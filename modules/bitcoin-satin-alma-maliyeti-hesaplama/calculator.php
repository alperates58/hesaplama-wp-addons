<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bitcoin_satin_alma_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bitcoin-satin-alma-maliyeti',
        HC_PLUGIN_URL . 'modules/bitcoin-satin-alma-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bitcoin-satin-alma-maliyeti-css',
        HC_PLUGIN_URL . 'modules/bitcoin-satin-alma-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bitcoin-satin-alma-maliyeti-hesaplama">
        <h3>Bitcoin Satın Alma Maliyeti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bsm-miktar">Alınan BTC Miktarı</label>
            <input type="number" id="hc-bsm-miktar" placeholder="Örn: 0.05" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-bsm-fiyat">Birim Fiyatı ($ veya ₺)</label>
            <input type="number" id="hc-bsm-fiyat" placeholder="Örn: 95000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-bsm-komisyon">Komisyon Oranı (%)</label>
            <input type="number" id="hc-bsm-komisyon" placeholder="Örn: 0.1" step="any" min="0" value="0.1">
        </div>
        <button class="hc-btn" onclick="hcBitcoinSatinAlmaMaliyetiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bsm-result">
            <h4>Satın Alma Maliyeti Detayları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Komisyonsuz Toplam Tutar</td>
                        <td id="hc-bsm-res-brut" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Toplam Komisyon Tutarı</td>
                        <td id="hc-bsm-res-komisyon" style="color:var(--hc-front-red);">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Maliyet (Komisyon Dahil)</td>
                        <td id="hc-bsm-res-net">0.00</td>
                    </tr>
                    <tr>
                        <td>Ortalama Alış Fiyatı (1 BTC)</td>
                        <td id="hc-bsm-res-ortalama" style="font-weight:bold;">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}