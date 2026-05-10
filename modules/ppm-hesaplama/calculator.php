<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ppm_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ppm-hesaplama',
        HC_PLUGIN_URL . 'modules/ppm-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ppm-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ppm-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ppm-calc">
        <h3>ppm Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ppm-mass">Çözünen Kütlesi (mg)</label>
            <input type="number" id="hc-ppm-mass" placeholder="Örn: 5">
        </div>
        <div class="hc-form-group">
            <label for="hc-ppm-vol">Toplam Hacim (Litre)</label>
            <input type="number" id="hc-ppm-vol" placeholder="Örn: 10">
        </div>
        <button class="hc-btn" onclick="hcPpmHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ppm-result">
            <div class="hc-result-label">Derişim:</div>
            <div class="hc-result-value" id="hc-ppm-val">-</div>
        </div>
    </div>
    <?php
}
