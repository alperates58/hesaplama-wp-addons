<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_hedef_fiyat_kar_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-hedef-fiyat-kar',
        HC_PLUGIN_URL . 'modules/kripto-hedef-fiyat-kar-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-hedef-fiyat-kar-css',
        HC_PLUGIN_URL . 'modules/kripto-hedef-fiyat-kar-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-hedef-fiyat-kar-hesaplama">
        <h3>Kripto Hedef Fiyat Kar Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hfk-alis">Alış Fiyatı ($ veya ₺)</label>
            <input type="number" id="hc-hfk-alis" placeholder="Örn: 0.50" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-hfk-hedef">Hedef Satış Fiyatı ($ veya ₺)</label>
            <input type="number" id="hc-hfk-hedef" placeholder="Örn: 1.20" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-hfk-miktar">Coin Miktarı</label>
            <input type="number" id="hc-hfk-miktar" placeholder="Örn: 5000" step="any" min="0">
        </div>
        <button class="hc-btn" onclick="hcKriptoHedefFiyatKarHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hfk-result">
            <h4>Hedef Satış Sonuçları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Yatırım Tutarı</td>
                        <td id="hc-hfk-res-yatirim" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Hedef Toplam Değer</td>
                        <td id="hc-hfk-res-toplam" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Hedeflenen Net Kar</td>
                        <td id="hc-hfk-res-kar">0.00</td>
                    </tr>
                    <tr>
                        <td>Yüzdesel Artış / Kar Oranı</td>
                        <td id="hc-hfk-res-oran" style="font-weight:bold;">%0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}