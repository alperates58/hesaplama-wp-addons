<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bitcoin_halving_tarihi_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bitcoin-halving',
        HC_PLUGIN_URL . 'modules/bitcoin-halving-tarihi-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bitcoin-halving-css',
        HC_PLUGIN_URL . 'modules/bitcoin-halving-tarihi-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bitcoin-halving-tarihi-tahmini-hesaplama">
        <h3>Bitcoin Halving Tarihi Tahmini Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bht-blok">Mevcut Blok Yüksekliği (Current Block Height)</label>
            <input type="number" id="hc-bht-blok" placeholder="Örn: 840000" step="1" min="0" value="845000">
        </div>
        <div class="hc-form-group">
            <label for="hc-bht-sure">Ortalama Blok Süresi (Dakika)</label>
            <input type="number" id="hc-bht-sure" placeholder="Örn: 10" step="any" min="1" value="10">
        </div>
        <button class="hc-btn" onclick="hcBitcoinHalvingHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bht-result">
            <h4>Halving Geri Sayım ve Tahmin Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Bir Sonraki Halving Bloğu</td>
                        <td id="hc-bht-res-hedef" style="font-weight:bold;">840,000</td>
                    </tr>
                    <tr>
                        <td>Kalan Blok Sayısı</td>
                        <td id="hc-bht-res-kalan-blok" style="font-weight:bold;">0</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Kalan Gün Süresi</td>
                        <td id="hc-bht-res-kalan-gun">0 Gün</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Tahmini Halving Tarihi</td>
                        <td id="hc-bht-res-tarih">01.01.2028</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}