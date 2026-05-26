<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_portfoy_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-portfoy-degeri',
        HC_PLUGIN_URL . 'modules/kripto-portfoy-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-portfoy-degeri-css',
        HC_PLUGIN_URL . 'modules/kripto-portfoy-degeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-portfoy-degeri-hesaplama">
        <h3>Kripto Portföy Değeri Hesaplama</h3>
        <table id="hc-kpd-table" style="width:100%; margin-bottom:15px;">
            <thead>
                <tr>
                    <th>Varlık Adı</th>
                    <th>Miktar</th>
                    <th>Fiyat ($ veya ₺)</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" class="hc-kpd-ad" placeholder="BTC" style="margin:0;"></td>
                    <td><input type="number" class="hc-kpd-miktar" placeholder="0.1" step="any" min="0" style="margin:0;"></td>
                    <td><input type="number" class="hc-kpd-fiyat" placeholder="95000" step="any" min="0" style="margin:0;"></td>
                    <td><button type="button" class="hc-btn-danger" onclick="hcKpdSilSatir(this)" style="padding:4px 8px; margin:0;">Sil</button></td>
                </tr>
            </tbody>
        </table>
        <div style="display:flex; gap:12px; margin-bottom:20px;">
            <button class="hc-btn" onclick="hcKpdEkleSatir()" style="background:#475569;">+ Satır Ekle</button>
            <button class="hc-btn" onclick="hcKpdHesapla()">Hesapla</button>
        </div>
        <div class="hc-result" id="hc-kpd-result">
            <h4>Portföy Dağılım Raporu:</h4>
            <table>
                <thead>
                    <tr>
                        <th>Varlık</th>
                        <th>Toplam Değer</th>
                        <th>Pay (%)</th>
                    </tr>
                </thead>
                <tbody id="hc-kpd-res-tbody">
                </tbody>
                <tfoot>
                    <tr style="font-weight:bold; font-size:16px; color:var(--hc-front-green);">
                        <td>Toplam Portföy Değeri</td>
                        <td id="hc-kpd-res-toplam" colspan="2">0.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <?php
}