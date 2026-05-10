<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_serbest_klor_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-serbest-klor-hesaplama',
        HC_PLUGIN_URL . 'modules/serbest-klor-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-serbest-klor-hesaplama-css',
        HC_PLUGIN_URL . 'modules/serbest-klor-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-free-chlorine">
        <h3>Serbest Klor Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sk-val">Ölçülen Serbest Klor (mg/L veya ppm)</label>
            <input type="number" id="hc-sk-val" placeholder="Örn: 1.5" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-sk-ph">Su pH Değeri</label>
            <input type="number" id="hc-sk-ph" value="7.2" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcSerbestKlorHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-sk-result">
            <div id="hc-sk-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
