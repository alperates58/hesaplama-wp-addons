<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kdv_tevkifat_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kdv-tevkifat',
        HC_PLUGIN_URL . 'modules/kdv-tevkifat-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kdv-tevkifat-css',
        HC_PLUGIN_URL . 'modules/kdv-tevkifat-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tevkifat">
        <h3>KDV Tevkifat Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kt-amount">Matrah (KDV Hariç Tutar ₺)</label>
            <input type="number" id="hc-kt-amount" placeholder="Örn: 10.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kt-kdv">KDV Oranı (%)</label>
            <select id="hc-kt-kdv">
                <option value="20">%20</option>
                <option value="10">%10</option>
                <option value="1">%1</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-kt-rate">Tevkifat Oranı</label>
            <select id="hc-kt-rate">
                <option value="0.2">2/10</option>
                <option value="0.3">3/10</option>
                <option value="0.4">4/10</option>
                <option value="0.5">5/10</option>
                <option value="0.7">7/10</option>
                <option value="0.9">9/10</option>
                <option value="1">10/10 (Tam Tevkifat)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKdvTevkifatHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kt-result">
            <div class="hc-result-item">
                <span>Hesaplanan KDV:</span>
                <strong id="hc-kt-res-kdv">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tevkif Edilen KDV:</span>
                <strong id="hc-kt-res-tevkifat">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tahsil Edilecek KDV:</span>
                <strong id="hc-kt-res-payable">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Genel Toplam (Fatura Tutarı):</span>
                <strong class="hc-result-value" id="hc-kt-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
