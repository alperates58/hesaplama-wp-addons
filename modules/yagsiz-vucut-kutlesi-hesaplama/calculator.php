<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yagsiz_vucut_kutlesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lbm-calc',
        HC_PLUGIN_URL . 'modules/yagsiz-vucut-kutlesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lbm-calc-css',
        HC_PLUGIN_URL . 'modules/yagsiz-vucut-kutlesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lbm-calc">
        <h3>Yağsız Vücut Kütlesi (LBM)</h3>
        <div class="hc-form-group">
            <label for="hc-lbm-weight">Toplam Kilo (kg):</label>
            <input type="number" id="hc-lbm-weight" placeholder="80">
        </div>
        <div class="hc-form-group">
            <label for="hc-lbm-percent">Vücut Yağ Oranı (%):</label>
            <input type="number" id="hc-lbm-percent" placeholder="20">
        </div>
        <button class="hc-btn" onclick="hcLbmCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-lbm-calc-result">
            <strong>Yağsız Kütle:</strong>
            <div id="hc-lbm-res-val" class="hc-result-value">-</div>
            <span>kg</span>
        </div>
    </div>
    <?php
}
