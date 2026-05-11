<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hisse_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hisse-getiri',
        HC_PLUGIN_URL . 'modules/hisse-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hisse-getiri-css',
        HC_PLUGIN_URL . 'modules/hisse-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hisse-g">
        <h3>Hisse Senedi Getirisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hg-buy">Alış Fiyatı (₺)</label>
            <input type="number" id="hc-hg-buy" placeholder="Örn: 50.00" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-hg-sell">Satış / Güncel Fiyat (₺)</label>
            <input type="number" id="hc-hg-sell" placeholder="Örn: 75.00" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-hg-dividend">Alınan Toplam Temettü (₺/Hisse)</label>
            <input type="number" id="hc-hg-dividend" value="0" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcHisseGetirisiHesapla()">Getiriyi Hesapla</button>
        <div class="hc-result" id="hc-hg-result">
            <div class="hc-result-item">
                <span>Net Kâr / Zarar (Birim):</span>
                <strong id="hc-hg-res-profit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Getiri Oranı:</span>
                <strong class="hc-result-value" id="hc-hg-res-ratio">-</strong>
            </div>
        </div>
    </div>
    <?php
}
