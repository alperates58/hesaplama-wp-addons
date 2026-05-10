<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ikili_sayi_cikarma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bin-sub',
        HC_PLUGIN_URL . 'modules/ikili-sayi-cikarma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bin-sub-css',
        HC_PLUGIN_URL . 'modules/ikili-sayi-cikarma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bin-sub">
        <h3>İkili Sayı Çıkarma</h3>
        <div class="hc-form-group">
            <label for="hc-bsb-s1">1. Sayı (Binary):</label>
            <input type="text" id="hc-bsb-s1" placeholder="1100">
        </div>
        <div class="hc-form-group">
            <label for="hc-bsb-s2">2. Sayı (Binary):</label>
            <input type="text" id="hc-bsb-s2" placeholder="1010">
        </div>
        <button class="hc-btn" onclick="hcBinSubHesapla()">Çıkar</button>
        <div class="hc-result" id="hc-bin-sub-result">
            <strong>Sonuç (Binary):</strong>
            <div id="hc-bsb-res-val" class="hc-result-value">-</div>
            <p id="hc-bsb-res-dec" style="margin-top:10px; font-size:0.9rem;"></p>
        </div>
    </div>
    <?php
}
