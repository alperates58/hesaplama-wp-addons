<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maksimum_nabiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-maksimum-nabiz-hesaplama',
        HC_PLUGIN_URL . 'modules/maksimum-nabiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-maksimum-nabiz-hesaplama-css',
        HC_PLUGIN_URL . 'modules/maksimum-nabiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-max-hr">
        <h3>Maksimum Nabız (MHR)</h3>
        <div class="hc-form-group">
            <label for="hc-mhr-age">Yaşınız</label>
            <input type="number" id="hc-mhr-age" placeholder="Örn: 30">
        </div>
        <button class="hc-btn" onclick="hcMaksimumNabızHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mhr-result">
            <div class="hc-result-label">Tahmini Maksimum Nabız:</div>
            <div class="hc-result-value" id="hc-mhr-val">-</div>
            <p style="font-size:0.85em; color:#666; margin-top:10px;">*Standart Formül: 220 - Yaş</p>
        </div>
    </div>
    <?php
}
