<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_ortalama_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-ortalama-maliyet',
        HC_PLUGIN_URL . 'modules/kripto-ortalama-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-ortalama-maliyet-css',
        HC_PLUGIN_URL . 'modules/kripto-ortalama-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-ortalama-maliyet-hesaplama">
        <h3>Kripto Ortalama Maliyet Hesaplama</h3>
        <table id="hc-kom-table" style="width:100%; margin-bottom:15px;">
            <thead>
                <tr>
                    <th>Alış Fiyatı</th>
                    <th>Miktar / Adet</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="number" class="hc-kom-fiyat" placeholder="90000" step="any" min="0" style="margin:0;"></td>
                    <td><input type="number" class="hc-kom-miktar" placeholder="0.02" step="any" min="0" style="margin:0;"></td>
                    <td><button type="button" class="hc-btn-danger" onclick="hcKomSilSatir(this)" style="padding:4px 8px; margin:0;">Sil</button></td>
                </tr>
            </tbody>
        </table>
        <div style="display:flex; gap:12px; margin-bottom:20px;">
            <button class="hc-btn" onclick="hcKomEkleSatir()" style="background:#475569;">+ Alım Ekle</button>
            <button class="hc-btn" onclick="hcKomHesapla()">Hesapla</button>
        </div>
        <div class="hc-result" id="hc-kom-result">
            <h4>Ortalama Maliyet Sonucu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Satın Alınan Miktar</td>
                        <td id="hc-kom-res-miktar" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Toplam Harcanan Tutar</td>
                        <td id="hc-kom-res-tutar" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Ortalama Alış Maliyeti</td>
                        <td id="hc-kom-res-ortalama">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}