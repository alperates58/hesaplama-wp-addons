<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_capraz_kur_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cross-rate',
        HC_PLUGIN_URL . 'modules/capraz-kur-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cross-rate-css',
        HC_PLUGIN_URL . 'modules/capraz-kur-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cross-rate">
        <h3>Çapraz Kur Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cr-rate1">Döviz 1 (Örn: EUR/TL)</label>
            <input type="number" id="hc-cr-rate1" step="0.0001" value="38.50">
        </div>

        <div class="hc-form-group">
            <label for="hc-cr-rate2">Döviz 2 (Örn: USD/TL)</label>
            <input type="number" id="hc-cr-rate2" step="0.0001" value="35.50">
        </div>
        
        <button class="hc-btn" onclick="hcCrossRateHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cross-rate-result">
            <div class="hc-result-value" id="hc-cr-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Döviz 1 / Döviz 2 Paritesi</p>
        </div>
    </div>
    <?php
}
