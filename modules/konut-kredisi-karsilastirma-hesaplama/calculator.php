<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_konut_kredisi_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-konut-kredisi-karsilastirma-hesaplama',
        HC_PLUGIN_URL . 'modules/konut-kredisi-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-konut-kredisi-karsilastirma-hesaplama-css',
        HC_PLUGIN_URL . 'modules/konut-kredisi-karsilastirma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-konut-kredisi-karsilastirma">
        <h3>Konut Kredisi Karşılaştırma Hesaplama</h3>
        <div class="hc-compare-grid">
            <div class="hc-compare-col">
                <h4>1. Teklif</h4>
                <div class="hc-form-group">
                    <label>Kredi Tutarı (₺)</label>
                    <input type="number" id="hc-kkk-amount1" placeholder="Örn: 2.000.000">
                </div>
                <div class="hc-form-group">
                    <label>Aylık Faiz (%)</label>
                    <input type="number" id="hc-kkk-rate1" placeholder="Örn: 2.5" step="0.01">
                </div>
                <div class="hc-form-group">
                    <label>Vade (Ay)</label>
                    <input type="number" id="hc-kkk-term1" placeholder="120">
                </div>
                <div class="hc-form-group">
                    <label>Dosya Masrafı vb. (₺)</label>
                    <input type="number" id="hc-kkk-fee1" placeholder="0">
                </div>
            </div>
            <div class="hc-compare-col">
                <h4>2. Teklif</h4>
                <div class="hc-form-group">
                    <label>Kredi Tutarı (₺)</label>
                    <input type="number" id="hc-kkk-amount2" placeholder="Örn: 2.000.000">
                </div>
                <div class="hc-form-group">
                    <label>Aylık Faiz (%)</label>
                    <input type="number" id="hc-kkk-rate2" placeholder="Örn: 2.7" step="0.01">
                </div>
                <div class="hc-form-group">
                    <label>Vade (Ay)</label>
                    <input type="number" id="hc-kkk-term2" placeholder="120">
                </div>
                <div class="hc-form-group">
                    <label>Dosya Masrafı vb. (₺)</label>
                    <input type="number" id="hc-kkk-fee2" placeholder="0">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcKonutKredisiKarsilastirmaHesapla()">Karşılaştır</button>
        <div class="hc-result" id="hc-kkk-result">
            <div class="hc-table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Özellik</th>
                            <th>1. Teklif</th>
                            <th>2. Teklif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Aylık Taksit</td>
                            <td id="hc-kkk-res-monthly1">-</td>
                            <td id="hc-kkk-res-monthly2">-</td>
                        </tr>
                        <tr>
                            <td>Toplam Geri Ödeme</td>
                            <td id="hc-kkk-res-total1">-</td>
                            <td id="hc-kkk-res-total2">-</td>
                        </tr>
                        <tr>
                            <td>Toplam Maliyet Farkı</td>
                            <td colspan="2" id="hc-kkk-res-diff" style="text-align:center; font-weight:bold;">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
