<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gida_israfi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gida-israfi-hesaplama',
        HC_PLUGIN_URL . 'modules/gida-israfi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gida-israfi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gida-israfi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-food-waste">
        <h3>Gıda İsrafı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fw-weekly">Haftalık Çöpe Giden Gıda (kg)</label>
            <input type="number" id="hc-fw-weekly" placeholder="Örn: 2">
        </div>
        <div class="hc-form-group">
            <label for="hc-fw-price">Ortalama kg Fiyatı (₺)</label>
            <input type="number" id="hc-fw-price" value="100">
        </div>
        <button class="hc-btn" onclick="hcGıdaİsrafıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fw-result">
            <div class="hc-result-label">Yıllık Kayıp:</div>
            <div class="hc-result-value" id="hc-fw-val">-</div>
            <p id="hc-fw-details" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
