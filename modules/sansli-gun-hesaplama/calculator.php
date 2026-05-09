<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sansli_gun_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lucky-day',
        HC_PLUGIN_URL . 'modules/sansli-gun-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lucky-day-css',
        HC_PLUGIN_URL . 'modules/sansli-gun-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sansli-gun-hesaplama">
        <h3>Şanslı Gün Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sg-date">Doğum Tarihi</label>
            <input type="date" id="hc-sg-date">
        </div>
        <button class="hc-btn" onclick="hcSansliGunBul()">Şanslı Günümü Bul</button>
        <div class="hc-result" id="hc-sg-result">
            <div class="hc-result-label">Size Şans Getiren Gün:</div>
            <div class="hc-result-value" id="hc-sg-val"></div>
            <div class="hc-result-desc" id="hc-sg-desc"></div>
        </div>
    </div>
    <?php
}
