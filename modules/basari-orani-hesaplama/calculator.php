<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_basari_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-basari-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/basari-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-basari-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/basari-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-success-rate">
        <h3>Başarı Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sr-success">Başarılı İşlem/Sonuç Sayısı:</label>
            <input type="number" id="hc-sr-success" class="hc-input" placeholder="Örn: 85">
        </div>
        <div class="hc-form-group">
            <label for="hc-sr-total">Toplam İşlem/Soru Sayısı:</label>
            <input type="number" id="hc-sr-total" class="hc-input" placeholder="Örn: 100">
        </div>
        <button class="hc-btn" onclick="hcSuccessRateHesapla()">Oranı Hesapla</button>
        <div class="hc-result" id="hc-basari-orani-hesaplama-result">
            <div class="hc-result-label">Başarı Yüzdesi:</div>
            <div class="hc-result-value" id="hc-res-sr-val">-</div>
            <p id="hc-sr-fail" style="margin-top:10px; font-size:0.9em; color:#666;"></p>
        </div>
    </div>
    <?php
}
