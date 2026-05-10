<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ikili_sayi_toplama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bin-add',
        HC_PLUGIN_URL . 'modules/ikili-sayi-toplama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bin-add-css',
        HC_PLUGIN_URL . 'modules/ikili-sayi-toplama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bin-add">
        <h3>İkili Sayı Toplama</h3>
        <div class="hc-form-group">
            <label for="hc-ba-s1">1. Sayı (Binary):</label>
            <input type="text" id="hc-ba-s1" placeholder="1010">
        </div>
        <div class="hc-form-group">
            <label for="hc-ba-s2">2. Sayı (Binary):</label>
            <input type="text" id="hc-ba-s2" placeholder="0101">
        </div>
        <button class="hc-btn" onclick="hcBinAddHesapla()">Topla</button>
        <div class="hc-result" id="hc-bin-add-result">
            <strong>Sonuç (Binary):</strong>
            <div id="hc-ba-res-val" class="hc-result-value">-</div>
            <p id="hc-ba-res-dec" style="margin-top:10px; font-size:0.9rem;"></p>
        </div>
    </div>
    <?php
}
