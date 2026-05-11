<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bist_hisse_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bist-getiri',
        HC_PLUGIN_URL . 'modules/bist-hisse-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bist-getiri-css',
        HC_PLUGIN_URL . 'modules/bist-hisse-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bist-g">
        <h3>BIST Hisse Getirisi (Komisyon Dahil)</h3>
        <div class="hc-form-group">
            <label for="hc-bg-shares">Hisse Adedi</label>
            <input type="number" id="hc-bg-shares" placeholder="Örn: 500">
        </div>
        <div class="hc-form-group">
            <label for="hc-bg-buy">Alış Fiyatı (₺)</label>
            <input type="number" id="hc-bg-buy" placeholder="Örn: 42.50" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-bg-sell">Satış Fiyatı (₺)</label>
            <input type="number" id="hc-bg-sell" placeholder="Örn: 48.00" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-bg-comm">Aracı Kurum Komisyonu (On Binde)</label>
            <input type="number" id="hc-bg-comm" value="20" placeholder="Örn: 20 (On binde 20)">
        </div>
        <button class="hc-btn" onclick="hcBistGetirisiHesapla()">Getiriyi Hesapla</button>
        <div class="hc-result" id="hc-bg-result">
            <div class="hc-result-item">
                <span>Ödenen Toplam Komisyon:</span>
                <strong id="hc-bg-res-comm">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Kâr / Zarar:</span>
                <strong id="hc-bg-res-profit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Getiri Oranı:</span>
                <strong class="hc-result-value" id="hc-bg-res-ratio">-</strong>
            </div>
        </div>
    </div>
    <?php
}
