<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uslu_sayi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uslu-sayi-hesaplama',
        HC_PLUGIN_URL . 'modules/uslu-sayi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-uslu-sayi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/uslu-sayi-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-uslu-sayi-hesaplama">
        <div class="hc-header">
            <h3>Üslü Sayı Hesaplama</h3>
            <p>Taban ve üs (kuvvet) değerlerini girin.</p>
        </div>
        
        <div class="hc-expo-ui">
            <input type="number" id="hc-expo-base" placeholder="Taban" step="any">
            <input type="number" id="hc-expo-pow" placeholder="Üs" step="any">
        </div>

        <button class="hc-btn" onclick="hcUsluHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-expo-result">
            <div class="hc-res-box">
                <div class="hc-res-label">SONUÇ</div>
                <div class="hc-res-main" id="hc-res-expo-val">-</div>
            </div>
        </div>
    </div>
    <?php
}
