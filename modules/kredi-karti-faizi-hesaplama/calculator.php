<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kredi_karti_faizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kredi-karti-faizi',
        HC_PLUGIN_URL . 'modules/kredi-karti-faizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kredi-karti-faizi-css',
        HC_PLUGIN_URL . 'modules/kredi-karti-faizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kk-faizi">
        <h3>Kredi Kartı Faizi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kkf-amount">Faiz İşleyecek Tutar (₺)</label>
            <input type="number" id="hc-kkf-amount" placeholder="Örn: 10.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkf-days">Gün Sayısı</label>
            <input type="number" id="hc-kkf-days" placeholder="Örn: 30">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkf-rate">Aylık Faiz Oranı (%)</label>
            <input type="number" id="hc-kkf-rate" value="5.00" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcKkFaiziHesapla()">Faiz Tutarı Hesapla</button>
        <div class="hc-result" id="hc-kkf-result">
            <div class="hc-result-item">
                <span>Net Faiz Tutarı:</span>
                <strong id="hc-kkf-res-net">-</strong>
            </div>
            <div class="hc-result-item">
                <span>KKDF (%15):</span>
                <strong id="hc-kkf-res-kkdf">-</strong>
            </div>
            <div class="hc-result-item">
                <span>BSMV (%15):</span>
                <strong id="hc-kkf-res-bsmv">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Ödenecek Faiz:</span>
                <strong class="hc-result-value" id="hc-kkf-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
