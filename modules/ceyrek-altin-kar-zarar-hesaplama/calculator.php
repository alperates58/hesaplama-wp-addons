<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ceyrek_altin_kar_zarar_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-quarter-profit',
        HC_PLUGIN_URL . 'modules/ceyrek-altin-kar-zarar-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-quarter-profit-css',
        HC_PLUGIN_URL . 'modules/ceyrek-altin-kar-zarar-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ceyrek-altin-kar-zarar-hesaplama">
        <h3>Çeyrek Altın Kar / Zarar Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cak-fiyat">Çeyrek Altın Alış Fiyatınız (TL - 1 Adet İçin)</label>
            <input type="number" id="hc-cak-fiyat" placeholder="Örn: 4200" min="100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cak-adet">Sahip Olduğunuz Çeyrek Altın Miktarı (Adet)</label>
            <input type="number" id="hc-cak-adet" value="5" min="1">
        </div>
        <button class="hc-btn" onclick="hcQuarterProfitHesapla()">Kâr/Zarar Durumunu Hesapla</button>
        
        <div class="hc-result" id="hc-cak-result">
            <h4>Yatırım Durum Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Anlık Çeyrek Altın Satış Fiyatı</td>
                        <td id="hc-cak-res-anlik">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Toplam Yatırım Tutarı</td>
                        <td id="hc-cak-res-toplam">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Güncel Toplam Değer</td>
                        <td id="hc-cak-res-guncel">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Net Kâr / Zarar Tutarı</td>
                        <td id="hc-cak-res-net">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Yatırım Getiri Oranı (ROI)</td>
                        <td id="hc-cak-res-roi" style="font-weight:bold;">%0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}