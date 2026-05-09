<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karma_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-karma-calc',
        HC_PLUGIN_URL . 'modules/karma-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-karma-calc-css',
        HC_PLUGIN_URL . 'modules/karma-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-karma-sayisi-hesaplama">
        <h3>Karma Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-karma-date">Doğum Tarihi</label>
            <input type="date" id="hc-karma-date">
        </div>
        <button class="hc-btn" onclick="hcKarmaHesapla()">Karmik Dersimi Bul</button>
        <div class="hc-result" id="hc-karma-result">
            <div class="hc-result-label">Karma Sayınız:</div>
            <div class="hc-result-value" id="hc-karma-val"></div>
            <div class="hc-result-desc" id="hc-karma-desc"></div>
        </div>
    </div>
    <?php
}
