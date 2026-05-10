<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vucut_yagi_kutlesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fat-mass',
        HC_PLUGIN_URL . 'modules/vucut-yagi-kutlesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fat-mass-css',
        HC_PLUGIN_URL . 'modules/vucut-yagi-kutlesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fat-mass">
        <h3>Vücut Yağı Kütlesi</h3>
        <div class="hc-form-group">
            <label for="hc-fm-weight">Toplam Kilo (kg):</label>
            <input type="number" id="hc-fm-weight" placeholder="80">
        </div>
        <div class="hc-form-group">
            <label for="hc-fm-percent">Vücut Yağ Oranı (%):</label>
            <input type="number" id="hc-fm-percent" placeholder="20">
        </div>
        <button class="hc-btn" onclick="hcFatMassHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fat-mass-result">
            <strong>Toplam Yağ Kütlesi:</strong>
            <div id="hc-fm-res-val" class="hc-result-value">-</div>
            <span>kg</span>
        </div>
    </div>
    <?php
}
