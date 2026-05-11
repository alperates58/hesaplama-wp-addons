<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_satis_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-satis-vergi',
        HC_PLUGIN_URL . 'modules/satis-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-satis-vergi-css',
        HC_PLUGIN_URL . 'modules/satis-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-satis-vergi-calc">
        <h3>Satış Vergisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sv-price">Net Satış Fiyatı (₺)</label>
            <input type="number" id="hc-sv-price" placeholder="Örn: 1.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-sv-rate">Satış Vergisi Oranı (%)</label>
            <input type="number" id="hc-sv-rate" placeholder="Örn: 8" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcSatisVergisiHesapla()">Vergili Fiyatı Hesapla</button>
        <div class="hc-result" id="hc-sv-result">
            <div class="hc-result-item">
                <span>Vergi Tutarı:</span>
                <strong id="hc-sv-res-tax">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Vergili Satış Toplamı:</span>
                <strong class="hc-result-value" id="hc-sv-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
