<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dca_kripto_ortalama_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dca-kripto-ortalama-maliyet',
        HC_PLUGIN_URL . 'modules/dca-kripto-ortalama-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dca-kripto-ortalama-maliyet-css',
        HC_PLUGIN_URL . 'modules/dca-kripto-ortalama-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dca-kripto-ortalama-maliyet-hesaplama">
        <h3>DCA Kripto Ortalama Maliyet Hesaplama</h3>
        <table id="hc-dca-table" style="width:100%; margin-bottom:15px;">
            <thead>
                <tr>
                    <th>Alım Tutarı ($ veya ₺)</th>
                    <th>Coin Birim Fiyatı</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="number" class="hc-dca-tutar" placeholder="100" step="any" min="0" style="margin:0;"></td>
                    <td><input type="number" class="hc-dca-fiyat" placeholder="85000" step="any" min="0" style="margin:0;"></td>
                    <td><button type="button" class="hc-btn-danger" onclick="hcDcaSilSatir(this)" style="padding:4px 8px; margin:0;">Sil</button></td>
                </tr>
            </tbody>
        </table>
        <div style="display:flex; gap:12px; margin-bottom:20px;">
            <button class="hc-btn" onclick="hcDcaEkleSatir()" style="background:#475569;">+ Periyodik Alım Ekle</button>
            <button class="hc-btn" onclick="hcDcaHesapla()">Hesapla</button>
        </div>
        <div class="hc-result" id="hc-dca-result">
            <h4>DCA Alış Sonuçları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Yatırılan Bakiye</td>
                        <td id="hc-dca-res-toplam-yatirim" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Satın Alınan Toplam Coin</td>
                        <td id="hc-dca-res-toplam-coin" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>DCA Ortalama Alış Maliyeti</td>
                        <td id="hc-dca-res-ortalama">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}