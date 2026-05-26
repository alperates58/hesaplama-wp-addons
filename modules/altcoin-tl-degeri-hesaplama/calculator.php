<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_altcoin_tl_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-altcoin-tl-degeri',
        HC_PLUGIN_URL . 'modules/altcoin-tl-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-altcoin-tl-degeri-css',
        HC_PLUGIN_URL . 'modules/altcoin-tl-degeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-altcoin-tl-degeri-hesaplama">
        <h3>Altcoin TL Değeri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-atd-miktar">Altcoin Miktarı</label>
            <input type="number" id="hc-atd-miktar" placeholder="Örn: 250" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-atd-fiyat">Altcoin Birim Fiyatı (USDT / $)</label>
            <input type="number" id="hc-atd-fiyat" placeholder="Örn: 2.45" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-atd-kur">Dolar Kuru ($ / ₺)</label>
            <input type="number" id="hc-atd-kur" placeholder="Örn: 33.50" step="any" min="0" value="33.50">
        </div>
        <button class="hc-btn" onclick="hcAltcoinTlDegeriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-atd-result">
            <h4>Hesaplanan Değerler:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Birim TL Fiyatı</td>
                        <td id="hc-atd-res-birim-tl" style="font-weight:bold;">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Toplam Portföy Değeri (USD)</td>
                        <td id="hc-atd-res-toplam-usd" style="font-weight:bold;">0.00 $</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Portföy Değeri (TL)</td>
                        <td id="hc-atd-res-toplam-tl">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}