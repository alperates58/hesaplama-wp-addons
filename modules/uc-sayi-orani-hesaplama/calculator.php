<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uc_sayi_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-three-ratio',
        HC_PLUGIN_URL . 'modules/uc-sayi-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-t-ratio">
        <h3>Üç Sayı Oranı (a : b : c)</h3>
        <div class="hc-form-group">
            <label>Sayı 1:</label><input type="number" id="hc-tr-a" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label>Sayı 2:</label><input type="number" id="hc-tr-b" placeholder="20">
        </div>
        <div class="hc-form-group">
            <label>Sayı 3:</label><input type="number" id="hc-tr-c" placeholder="30">
        </div>
        <button class="hc-btn" onclick="hcThreeRatioHesapla()">Oranı Bul</button>
        <div class="hc-result" id="hc-uc-sayi-orani-result">
            <strong>Sadeleşmiş Oran:</strong>
            <div id="hc-tr-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
