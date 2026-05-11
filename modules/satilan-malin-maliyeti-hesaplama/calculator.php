<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_satilan_malin_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-satilan-malin-maliyeti-hesaplama',
        HC_PLUGIN_URL . 'modules/satilan-malin-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-satilan-malin-maliyeti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/satilan-malin-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-satilan-malin-maliyeti">
        <h3>Satılan Malın Maliyeti (SMM) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-smm-opening">Dönem Başı Stok Değeri (₺)</label>
            <input type="number" id="hc-smm-opening" placeholder="Örn: 200.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-smm-purchases">Dönem İçi Alışlar / Üretim Giderleri (₺)</label>
            <input type="number" id="hc-smm-purchases" placeholder="Örn: 500.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-smm-closing">Dönem Sonu Stok Değeri (₺)</label>
            <input type="number" id="hc-smm-closing" placeholder="Örn: 150.000">
        </div>
        <button class="hc-btn" onclick="hcSatilanMalinMaliyetiHesapla()">SMM Hesapla</button>
        <div class="hc-result" id="hc-smm-result">
            <div class="hc-result-item">
                <span>Satılan Malın Maliyeti (SMM):</span>
                <strong class="hc-result-value" id="hc-smm-value">-</strong>
            </div>
            <p class="hc-small-text">SMM = (Dönem Başı Stok + Alışlar) - Dönem Sonu Stok</p>
        </div>
    </div>
    <?php
}
