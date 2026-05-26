<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_platin_paladyum_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-plat-pallad',
        HC_PLUGIN_URL . 'modules/platin-paladyum-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-plat-pallad-css',
        HC_PLUGIN_URL . 'modules/platin-paladyum-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-platin-paladyum-deger-hesaplama">
        <h3>Platin & Paladyum Değer Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ppd-metal">Metal Türü</label>
            <select id="hc-ppd-metal">
                <option value="gram-platin" selected>Platin (Gram)</option>
                <option value="gram-paladyum">Paladyum (Gram)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ppd-miktar">Sahip Olduğunuz Miktar (Gram)</label>
            <input type="number" id="hc-ppd-miktar" value="50" min="1">
        </div>
        <button class="hc-btn" onclick="hcPlatinPaladyumHesapla()">Toplam Değeri Hesapla</button>
        
        <div class="hc-result" id="hc-ppd-result">
            <h4>Portföy Değer Özeti:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Metal Birim Satış Fiyatı (Piyasa)</td>
                        <td id="hc-ppd-res-fiyat">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Portföy Değeri (TL)</td>
                        <td id="hc-ppd-res-toplam">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}