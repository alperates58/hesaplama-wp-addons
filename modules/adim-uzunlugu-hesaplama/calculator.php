<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_adim_uzunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stride-len',
        HC_PLUGIN_URL . 'modules/adim-uzunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stride-len-css',
        HC_PLUGIN_URL . 'modules/adim-uzunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stride-len">
        <h3>Adım Uzunluğu Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-sl-dist">Katettiğiniz Mesafe (Metre):</label>
            <input type="number" id="hc-sl-dist" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-sl-steps">Mesafe İçindeki Adım Sayısı:</label>
            <input type="number" id="hc-sl-steps" placeholder="130">
        </div>
        <button class="hc-btn" onclick="hcStrideLenHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-stride-len-result">
            <strong>Ortalama Adım Uzunluğu:</strong>
            <div id="hc-sl-res-val" class="hc-result-value">-</div>
            <span>Santimetre (cm)</span>
        </div>
    </div>
    <?php
}
