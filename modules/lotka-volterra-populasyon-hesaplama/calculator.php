<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lotka_volterra_populasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lotka-volterra-populasyon-hesaplama',
        HC_PLUGIN_URL . 'modules/lotka-volterra-populasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lotka-volterra-populasyon-hesaplama-css',
        HC_PLUGIN_URL . 'modules/lotka-volterra-populasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lotka">
        <h3>Lotka-Volterra Popülasyon Simülatörü</h3>
        <div class="hc-form-group">
            <label for="hc-lv-prey">Başlangıç Av Sayısı (x0)</label>
            <input type="number" id="hc-lv-prey" value="40">
        </div>
        <div class="hc-form-group">
            <label for="hc-lv-predator">Başlangıç Avcı Sayısı (y0)</label>
            <input type="number" id="hc-lv-predator" value="9">
        </div>
        <div class="hc-form-group">
            <label for="hc-lv-time">Simülasyon Süresi (Adım)</label>
            <input type="number" id="hc-lv-time" value="50">
        </div>
        <button class="hc-btn" onclick="hcLotkaVolterraHesapla()">Simüle Et</button>
        <div class="hc-result" id="hc-lv-result">
            <div id="hc-lv-stats" style="text-align:left; font-size:0.9em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
