<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kdv_dahil_haric_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kdv-dh',
        HC_PLUGIN_URL . 'modules/kdv-dahil-haric-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kdv-dh-css',
        HC_PLUGIN_URL . 'modules/kdv-dahil-haric-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kdv-dh">
        <h3>KDV Dahil / Hariç Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kd-type">İşlem Türü</label>
            <select id="hc-kd-type">
                <option value="hariç">KDV Hariç Tutar Girilecek</option>
                <option value="dahil">KDV Dahil Tutar Girilecek</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-kd-amount">Tutar (₺)</label>
            <input type="number" id="hc-kd-amount" placeholder="Örn: 1.200">
        </div>
        <div class="hc-form-group">
            <label for="hc-kd-rate">KDV Oranı (%)</label>
            <select id="hc-kd-rate">
                <option value="20">%20</option>
                <option value="10">%10</option>
                <option value="1">%1</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKdvDhHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kd-result">
            <div class="hc-result-item">
                <span>KDV Hariç:</span>
                <strong id="hc-kd-res-excl">-</strong>
            </div>
            <div class="hc-result-item">
                <span>KDV Tutarı:</span>
                <strong id="hc-kd-res-tax">-</strong>
            </div>
            <div class="hc-result-item">
                <span>KDV Dahil:</span>
                <strong class="hc-result-value" id="hc-kd-res-incl">-</strong>
            </div>
        </div>
    </div>
    <?php
}
