<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kdv_hesaplama_tevkifatli( $atts ) {
    wp_enqueue_script(
        'hc-kdv-hesaplama-tevkifatli',
        HC_PLUGIN_URL . 'modules/kdv-hesaplama-tevkifatli/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kdv-hesaplama-tevkifatli-css',
        HC_PLUGIN_URL . 'modules/kdv-hesaplama-tevkifatli/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kdv-tevkifat">
        <h3>KDV Hesaplama (Tevkifatlı)</h3>
        <div class="hc-form-group">
            <label for="hc-kdv-amount">Mal/Hizmet Tutarı (KDV Hariç ₺)</label>
            <input type="number" id="hc-kdv-amount" placeholder="Örn: 10.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kdv-rate">KDV Oranı (%)</label>
            <select id="hc-kdv-rate">
                <option value="20">%20</option>
                <option value="10">%10</option>
                <option value="1">%1</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-kdv-tevkifat-rate">Tevkifat Oranı</label>
            <select id="hc-kdv-tevkifat-rate">
                <option value="0">Tevkifat Yok</option>
                <option value="0.2">2/10</option>
                <option value="0.3">3/10</option>
                <option value="0.4">4/10</option>
                <option value="0.5">5/10</option>
                <option value="0.7">7/10</option>
                <option value="0.9">9/10</option>
                <option value="1">Tam Tevkifat (10/10)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKdvTevkifatHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kdv-tevkifat-result">
            <div class="hc-result-item">
                <span>Hesaplanan KDV (%):</span>
                <strong id="hc-kdv-res-total-kdv">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tevkifat Tutarı (Beyan Edilecek):</span>
                <strong id="hc-kdv-res-tevkifat">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tahsil Edilecek KDV (Satıcıya):</span>
                <strong id="hc-kdv-res-seller-kdv">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Genel Toplam (Fatura Tutarı):</span>
                <strong class="hc-result-value" id="hc-kdv-res-grand">-</strong>
            </div>
        </div>
    </div>
    <?php
}
