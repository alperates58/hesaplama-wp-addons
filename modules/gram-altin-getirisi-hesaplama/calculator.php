<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gram_altin_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gram-altin-getiri',
        HC_PLUGIN_URL . 'modules/gram-altin-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gram-altin-getiri-css',
        HC_PLUGIN_URL . 'modules/gram-altin-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gram-altin">
        <h3>Gram Altın Getirisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ga-amount">Altın Miktarı (Gram)</label>
            <input type="number" id="hc-ga-amount" placeholder="Örn: 50" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-ga-buy">Alış Fiyatı (₺/Gr)</label>
            <input type="number" id="hc-ga-buy" placeholder="Örn: 2.450" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-ga-sell">Satış / Güncel Fiyat (₺/Gr)</label>
            <input type="number" id="hc-ga-sell" placeholder="Örn: 3.100" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcGramAltinGetirisiHesapla()">Getiriyi Hesapla</button>
        <div class="hc-result" id="hc-ga-result">
            <div class="hc-result-item">
                <span>Net Kâr / Zarar:</span>
                <strong id="hc-ga-res-profit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Getiri Oranı:</span>
                <strong class="hc-result-value" id="hc-ga-res-ratio">-</strong>
            </div>
        </div>
    </div>
    <?php
}
