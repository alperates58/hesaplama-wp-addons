<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_seri_seyreltme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-seri-seyreltme-hesaplama',
        HC_PLUGIN_URL . 'modules/seri-seyreltme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-seri-seyreltme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/seri-seyreltme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-serial-dilution">
        <h3>Seri Seyreltme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sd-start">Başlangıç Derişimi</label>
            <input type="number" id="hc-sd-start" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label for="hc-sd-factor">Seyreltme Faktörü (Her adımda)</label>
            <input type="number" id="hc-sd-factor" value="10" placeholder="Örn: 10 (1/10 seyreltme)">
        </div>
        <div class="hc-form-group">
            <label for="hc-sd-steps">Adım Sayısı</label>
            <input type="number" id="hc-sd-steps" value="5" min="1">
        </div>
        <button class="hc-btn" onclick="hcSeriSeyreltmeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sd-result">
            <div id="hc-sd-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
