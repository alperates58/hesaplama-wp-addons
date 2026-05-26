<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_unit_ekonomisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-unit-ekonomi',
        HC_PLUGIN_URL . 'modules/unit-ekonomisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-unit-ekonomi-css',
        HC_PLUGIN_URL . 'modules/unit-ekonomisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-unit-ekonomisi-hesaplama">
        <h3>Unit Ekonomisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ue-fiyat">Birim Satış Fiyatı (LTV veya Tek Seferlik Fiyat) (₺ veya $)</label>
            <input type="number" id="hc-ue-fiyat" placeholder="Örn: 500" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ue-cogs">Birim Satışın Değişken Maliyeti (COGS - Bulut, sunucu, işlem masrafı vb.)</label>
            <input type="number" id="hc-ue-cogs" placeholder="Örn: 80" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ue-cac">Müşteri Başına Edinme Maliyeti (CAC)</label>
            <input type="number" id="hc-ue-cac" placeholder="Örn: 150" step="any" min="0" value="0">
        </div>
        <button class="hc-btn" onclick="hcUnitEkonomiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ue-result">
            <h4>Birim Ekonomi Analizi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Birim Brüt Kar (Fiyat - COGS)</td>
                        <td id="hc-ue-res-brut-kar" style="font-weight:bold; color:var(--hc-front-green);">0.00</td>
                    </tr>
                    <tr>
                        <td>Birim Brüt Kar Marjı (%)</td>
                        <td id="hc-ue-res-brut-marj" style="font-weight:bold;">%0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold;">
                        <td>Müşteri Başına Net Katkı Payı (Contribution Margin)</td>
                        <td id="hc-ue-res-katki">0.00</td>
                    </tr>
                    <tr style="font-size:14px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Birim Başına Net Kar Marjı (%)</td>
                        <td id="hc-ue-res-net-marj">%0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}