<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_euro_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-euro-getiri',
        HC_PLUGIN_URL . 'modules/euro-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-euro-getiri-css',
        HC_PLUGIN_URL . 'modules/euro-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-euro-g">
        <h3>Euro Getirisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-eg-amount">Euro Miktarı (€)</label>
            <input type="number" id="hc-eg-amount" placeholder="Örn: 1.000" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-eg-buy">Alış Kuru (₺/€)</label>
            <input type="number" id="hc-eg-buy" placeholder="Örn: 35.50" step="0.0001">
        </div>
        <div class="hc-form-group">
            <label for="hc-eg-sell">Satış / Güncel Kur (₺/€)</label>
            <input type="number" id="hc-eg-sell" placeholder="Örn: 38.00" step="0.0001">
        </div>
        <button class="hc-btn" onclick="hcEuroGetirisiHesapla()">Getiriyi Hesapla</button>
        <div class="hc-result" id="hc-eg-result">
            <div class="hc-result-item">
                <span>Net Kâr / Zarar:</span>
                <strong id="hc-eg-res-profit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Getiri Oranı:</span>
                <strong class="hc-result-value" id="hc-eg-res-ratio">-</strong>
            </div>
        </div>
    </div>
    <?php
}
