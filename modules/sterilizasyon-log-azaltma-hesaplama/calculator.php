<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sterilizasyon_log_azaltma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-log-red',
        HC_PLUGIN_URL . 'modules/sterilizasyon-log-azaltma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-log-red-css',
        HC_PLUGIN_URL . 'modules/sterilizasyon-log-azaltma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-log-red">
        <h3>Log Azaltma (Log Reduction)</h3>
        <div class="hc-form-group">
            <label for="hc-lr-before">Başlangıç Sayısı (N0):</label>
            <input type="number" id="hc-lr-before" placeholder="1000000">
        </div>
        <div class="hc-form-group">
            <label for="hc-lr-after">Kalan Sayı (N):</label>
            <input type="number" id="hc-lr-after" placeholder="10">
        </div>
        <button class="hc-btn" onclick="hcLogRedHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-log-red-result">
            <strong>Log Azaltma Değeri:</strong>
            <div id="hc-lr-res-val" class="hc-result-value">-</div>
            <div id="hc-lr-res-perc" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
