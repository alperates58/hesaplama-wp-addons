<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ikili_sayi_carpma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bin-mul',
        HC_PLUGIN_URL . 'modules/ikili-sayi-carpma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bin-mul-css',
        HC_PLUGIN_URL . 'modules/ikili-sayi-carpma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bin-mul">
        <h3>İkili Sayı Çarpma</h3>
        <div class="hc-form-group">
            <label for="hc-bm-s1">1. Sayı (Binary):</label>
            <input type="text" id="hc-bm-s1" placeholder="1010">
        </div>
        <div class="hc-form-group">
            <label for="hc-bm-s2">2. Sayı (Binary):</label>
            <input type="text" id="hc-bm-s2" placeholder="11">
        </div>
        <button class="hc-btn" onclick="hcBinMulHesapla()">Çarp</button>
        <div class="hc-result" id="hc-bin-mul-result">
            <strong>Sonuç (Binary):</strong>
            <div id="hc-bm-res-val" class="hc-result-value">-</div>
            <p id="hc-bm-res-dec" style="margin-top:10px; font-size:0.9rem;"></p>
        </div>
    </div>
    <?php
}
