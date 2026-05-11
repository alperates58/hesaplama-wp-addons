<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pos_komisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pos-komisyonu',
        HC_PLUGIN_URL . 'modules/pos-komisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pos-komisyonu-css',
        HC_PLUGIN_URL . 'modules/pos-komisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pos-komisyon">
        <h3>POS Komisyonu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pos-amount">Satış Tutarı (₺)</label>
            <input type="number" id="hc-pos-amount" placeholder="Örn: 1.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-pos-rate">Komisyon Oranı (%)</label>
            <input type="number" id="hc-pos-rate" placeholder="Örn: 3.5" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-pos-fixed">İşlem Başı Sabit Ücret (₺ - Varsa)</label>
            <input type="number" id="hc-pos-fixed" value="0.00" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcPosKomisyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pos-result">
            <div class="hc-result-item">
                <span>Toplam Komisyon Kesintisi:</span>
                <strong id="hc-pos-res-fee">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Hesaba Geçecek Net Tutar:</span>
                <strong class="hc-result-value" id="hc-pos-res-net">-</strong>
            </div>
        </div>
    </div>
    <?php
}
