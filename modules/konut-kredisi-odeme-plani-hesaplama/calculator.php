<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_konut_kredisi_odeme_plani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-konut-kredisi-odeme-plani-hesaplama',
        HC_PLUGIN_URL . 'modules/konut-kredisi-odeme-plani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-konut-kredisi-odeme-plani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/konut-kredisi-odeme-plani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-konut-kredisi-odeme-plani">
        <h3>Konut Kredisi Ödeme Planı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kkop-amount">Kredi Tutarı (₺)</label>
            <input type="number" id="hc-kkop-amount" placeholder="Örn: 2.000.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkop-rate">Aylık Faiz Oranı (%)</label>
            <input type="number" id="hc-kkop-rate" placeholder="Örn: 2.5" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkop-term">Vade (Ay)</label>
            <input type="number" id="hc-kkop-term" placeholder="Örn: 120" step="1">
        </div>
        <button class="hc-btn" onclick="hcKonutKredisiOdemePlaniHesapla()">Planı Oluştur</button>
        <div class="hc-result" id="hc-kkop-result">
            <div class="hc-result-summary">
                <p>Aylık Taksit: <strong id="hc-kkop-monthly">-</strong></p>
                <p>Toplam Geri Ödeme: <strong id="hc-kkop-total">-</strong></p>
                <p>Toplam Faiz: <strong id="hc-kkop-total-interest">-</strong></p>
            </div>
            <div class="hc-table-wrapper">
                <table id="hc-kkop-table">
                    <thead>
                        <tr>
                            <th>Taksit</th>
                            <th>Taksit Tutarı</th>
                            <th>Anapara</th>
                            <th>Faiz</th>
                            <th>Kalan Borç</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
