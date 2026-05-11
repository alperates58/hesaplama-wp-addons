<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dolar_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dolar-getiri',
        HC_PLUGIN_URL . 'modules/dolar-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dolar-getiri-css',
        HC_PLUGIN_URL . 'modules/dolar-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dolar-g">
        <h3>Dolar Getirisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dg-amount">Dolar Miktarı ($)</label>
            <input type="number" id="hc-dg-amount" placeholder="Örn: 1.000" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-dg-buy">Alış Kuru (₺/$)</label>
            <input type="number" id="hc-dg-buy" placeholder="Örn: 32.50" step="0.0001">
        </div>
        <div class="hc-form-group">
            <label for="hc-dg-sell">Satış / Güncel Kur (₺/$)</label>
            <input type="number" id="hc-dg-sell" placeholder="Örn: 35.00" step="0.0001">
        </div>
        <button class="hc-btn" onclick="hcDolarGetirisiHesapla()">Getiriyi Hesapla</button>
        <div class="hc-result" id="hc-dg-result">
            <div class="hc-result-item">
                <span>Net Kâr / Zarar:</span>
                <strong id="hc-dg-res-profit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Getiri Oranı:</span>
                <strong class="hc-result-value" id="hc-dg-res-ratio">-</strong>
            </div>
        </div>
    </div>
    <?php
}
