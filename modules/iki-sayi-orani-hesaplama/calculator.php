<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iki_sayi_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ratio-calc',
        HC_PLUGIN_URL . 'modules/iki-sayi-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ratio-calc-css',
        HC_PLUGIN_URL . 'modules/iki-sayi-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ratio">
        <h3>İki Sayı Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rt-s1">A Sayısı:</label>
            <input type="number" id="hc-rt-s1" placeholder="örn: 40">
        </div>
        <div class="hc-form-group">
            <label for="hc-rt-s2">B Sayısı:</label>
            <input type="number" id="hc-rt-s2" placeholder="örn: 20">
        </div>
        <button class="hc-btn" onclick="hcRatioCalcHesapla()">Oranı Hesapla</button>
        <div class="hc-result" id="hc-ratio-result">
            <strong>Oran (A : B):</strong>
            <div id="hc-rt-res-val" class="hc-result-value">-</div>
            <p id="hc-rt-res-simple" style="margin-top:10px; font-weight:bold; color:var(--hc-primary);"></p>
        </div>
    </div>
    <?php
}
