<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_seri_seyreltme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-serial-dil',
        HC_PLUGIN_URL . 'modules/seri-seyreltme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-serial-dil-css',
        HC_PLUGIN_URL . 'modules/seri-seyreltme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-serial-dil">
        <h3>Seri Seyreltme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sd-factor">Seyreltme Oranı (Örn: 1/10 ise 10 girin):</label>
            <input type="number" id="hc-sd-factor" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-sd-vol">Her Tüpteki Hedef Hacim (mL):</label>
            <input type="number" id="hc-sd-vol" placeholder="9">
        </div>
        <button class="hc-btn" onclick="hcSerialDilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-serial-dil-result">
            <div id="hc-sd-res-info"></div>
        </div>
    </div>
    <?php
}
