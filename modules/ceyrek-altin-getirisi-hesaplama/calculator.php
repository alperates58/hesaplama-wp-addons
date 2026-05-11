<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ceyrek_altin_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ceyrek-altin-getiri',
        HC_PLUGIN_URL . 'modules/ceyrek-altin-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ceyrek-altin-getiri-css',
        HC_PLUGIN_URL . 'modules/ceyrek-altin-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ceyrek-altin">
        <h3>Çeyrek Altın Getirisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ca-count">Altın Adedi (Çeyrek)</label>
            <input type="number" id="hc-ca-count" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-ca-buy">Alış Fiyatı (₺/Adet)</label>
            <input type="number" id="hc-ca-buy" placeholder="Örn: 4.200" step="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ca-sell">Satış / Güncel Fiyat (₺/Adet)</label>
            <input type="number" id="hc-ca-sell" placeholder="Örn: 5.100" step="1">
        </div>
        <button class="hc-btn" onclick="hcCeyrekAltinGetirisiHesapla()">Getiriyi Hesapla</button>
        <div class="hc-result" id="hc-ca-result">
            <div class="hc-result-item">
                <span>Net Kâr / Zarar:</span>
                <strong id="hc-ca-res-profit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Getiri Oranı:</span>
                <strong class="hc-result-value" id="hc-ca-res-ratio">-</strong>
            </div>
        </div>
    </div>
    <?php
}
