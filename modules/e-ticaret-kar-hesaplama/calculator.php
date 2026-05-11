<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_e_ticaret_kar_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-e-ticaret-kar',
        HC_PLUGIN_URL . 'modules/e-ticaret-kar-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-e-ticaret-kar-css',
        HC_PLUGIN_URL . 'modules/e-ticaret-kar-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-et-kar">
        <h3>E-Ticaret Kâr Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-etk-sale">Satış Fiyatı (₺)</label>
            <input type="number" id="hc-etk-sale" placeholder="Örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-etk-cost">Ürün Alış Maliyeti (₺)</label>
            <input type="number" id="hc-etk-cost" placeholder="Örn: 400">
        </div>
        <div class="hc-form-group">
            <label for="hc-etk-comm">Komisyon Oranı (%)</label>
            <input type="number" id="hc-etk-comm" placeholder="Örn: 15">
        </div>
        <div class="hc-form-group">
            <label for="hc-etk-ship">Kargo + Paketleme (₺)</label>
            <input type="number" id="hc-etk-ship" placeholder="Örn: 55">
        </div>
        <div class="hc-form-group">
            <label for="hc-etk-ad">Reklam Maliyeti (Ürün Başı ₺)</label>
            <input type="number" id="hc-etk-ad" placeholder="Örn: 20">
        </div>
        <button class="hc-btn" onclick="hcEtKarHesapla()">Kâr Hesapla</button>
        <div class="hc-result" id="hc-etk-result">
            <div class="hc-result-item">
                <span>Toplam Gider:</span>
                <strong id="hc-etk-res-total-cost">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Kâr (Vergi Öncesi):</span>
                <strong class="hc-result-value" id="hc-etk-res-profit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>ROI (Yatırım Getirisi):</span>
                <strong id="hc-etk-res-roi">-</strong>
            </div>
        </div>
    </div>
    <?php
}
