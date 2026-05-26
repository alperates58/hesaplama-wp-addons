<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_kar_zarar_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-kar-zarar',
        HC_PLUGIN_URL . 'modules/kripto-kar-zarar-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-kar-zarar-css',
        HC_PLUGIN_URL . 'modules/kripto-kar-zarar-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-kar-zarar-hesaplama">
        <h3>Kripto Kar Zarar Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kkz-alis">Alış Fiyatı ($ veya ₺)</label>
            <input type="number" id="hc-kkz-alis" placeholder="Örn: 1.20" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkz-satis">Satış Fiyatı ($ veya ₺)</label>
            <input type="number" id="hc-kkz-satis" placeholder="Örn: 1.50" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkz-miktar">Coin Miktarı</label>
            <input type="number" id="hc-kkz-miktar" placeholder="Örn: 1000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkz-komisyon">Komisyon Oranı (%)</label>
            <input type="number" id="hc-kkz-komisyon" placeholder="Örn: 0.1" step="any" min="0" value="0.1">
        </div>
        <button class="hc-btn" onclick="hcKriptoKarZararHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kkz-result">
            <h4>İşlem Sonuçları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Alış Maliyeti (Komisyonlu)</td>
                        <td id="hc-kkz-res-maliyet" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Toplam Satış Geliri (Komisyonlu)</td>
                        <td id="hc-kkz-res-gelir" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold;">
                        <td>Net Kar / Zarar</td>
                        <td id="hc-kkz-res-karzarar">0.00</td>
                    </tr>
                    <tr>
                        <td>Yatırım Getirisi (ROI)</td>
                        <td id="hc-kkz-res-roi" style="font-weight:bold;">%0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}