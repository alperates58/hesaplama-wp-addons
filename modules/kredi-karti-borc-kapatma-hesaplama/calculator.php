<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kredi_karti_borc_kapatma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kredi-karti-borc-kapatma',
        HC_PLUGIN_URL . 'modules/kredi-karti-borc-kapatma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kredi-karti-borc-kapatma-css',
        HC_PLUGIN_URL . 'modules/kredi-karti-borc-kapatma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kk-borc-kapatma">
        <h3>Kredi Kartı Borç Kapatma Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-kkbk-balance">Kapatılacak Toplam Borç (₺)</label>
            <input type="number" id="hc-kkbk-balance" placeholder="Örn: 50.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkbk-card-rate">Kart Aylık Akdi Faiz Oranı (%)</label>
            <input type="number" id="hc-kkbk-card-rate" value="5.00" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkbk-loan-rate">Kapatma Kredisi Aylık Faiz Oranı (%)</label>
            <input type="number" id="hc-kkbk-loan-rate" value="3.99" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkbk-months">Vade (Ay)</label>
            <input type="number" id="hc-kkbk-months" value="12">
        </div>
        <button class="hc-btn" onclick="hcKkBorcKapatmaHesapla()">Kıyasla ve Hesapla</button>
        <div class="hc-result" id="hc-kkbk-result">
            <div class="hc-result-item">
                <span>Kart Borcu Aylık Tahmini Faiz:</span>
                <strong id="hc-kkbk-card-interest">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kredi Aylık Taksit:</span>
                <strong id="hc-kkbk-loan-payment">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Toplam Tasarruf (Vade Boyunca):</span>
                <strong class="hc-result-value" id="hc-kkbk-savings">-</strong>
            </div>
        </div>
    </div>
    <?php
}
