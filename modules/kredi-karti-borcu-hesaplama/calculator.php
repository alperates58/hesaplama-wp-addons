<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kredi_karti_borcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kredi-karti-borcu',
        HC_PLUGIN_URL . 'modules/kredi-karti-borcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kredi-karti-borcu-css',
        HC_PLUGIN_URL . 'modules/kredi-karti-borcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kk-borcu">
        <h3>Kredi Kartı Borcu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kkb-balance">Toplam Ekstre Borcu (₺)</label>
            <input type="number" id="hc-kkb-balance" placeholder="Örn: 20.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkb-payment">Yapılacak Ödeme Tutarı (₺)</label>
            <input type="number" id="hc-kkb-payment" placeholder="Örn: 5.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkb-rate">Aylık Akdi Faiz Oranı (% - 2026 Tahmini)</label>
            <input type="number" id="hc-kkb-rate" value="5.00" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcKkBorcuHesapla()">Borcu Hesapla</button>
        <div class="hc-result" id="hc-kkb-result">
            <div class="hc-result-item">
                <span>Kalan Anapara Borcu:</span>
                <strong id="hc-kkb-res-principal">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Aylık Faiz (KKDF+BSMV Dahil):</span>
                <strong id="hc-kkb-res-interest">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Gelecek Ay Tahmini Borç:</span>
                <strong class="hc-result-value" id="hc-kkb-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
