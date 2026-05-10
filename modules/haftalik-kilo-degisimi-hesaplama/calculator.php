<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_haftalik_kilo_degisimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-weekly-weight',
        HC_PLUGIN_URL . 'modules/haftalik-kilo-degisimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-weekly-weight-css',
        HC_PLUGIN_URL . 'modules/haftalik-kilo-degisimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-weekly-weight">
        <h3>Haftalık Kilo Değişimi</h3>
        <div class="hc-form-group">
            <label for="hc-ww-last">Geçen Haftaki Kilo (kg):</label>
            <input type="number" id="hc-ww-last" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ww-this">Bu Haftaki Kilo (kg):</label>
            <input type="number" id="hc-ww-this" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcWeeklyWeightHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-weekly-weight-result">
            <strong>Değişim: <span id="hc-ww-res-val" class="hc-result-value">-</span> kg</strong>
            <div id="hc-ww-res-desc" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
