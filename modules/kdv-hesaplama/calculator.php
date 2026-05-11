<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kdv_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kdv-hesapla',
        HC_PLUGIN_URL . 'modules/kdv-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kdv-hesapla-css',
        HC_PLUGIN_URL . 'modules/kdv-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kdv">
        <h3>KDV Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kdv-amount">Tutar (₺)</label>
            <input type="number" id="hc-kdv-amount" placeholder="Örn: 1.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kdv-rate">KDV Oranı (%)</label>
            <select id="hc-kdv-rate">
                <option value="20">%20 (Genel Oran)</option>
                <option value="10">%10 (Gıda, Tekstil vb.)</option>
                <option value="1">%1 (Temel Gıda vb.)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKdvHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kdv-result">
            <div class="hc-result-item">
                <span>KDV Tutarı:</span>
                <strong id="hc-kdv-res-tax">-</strong>
            </div>
            <div class="hc-result-item">
                <span>KDV Dahil Toplam:</span>
                <strong class="hc-result-value" id="hc-kdv-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
