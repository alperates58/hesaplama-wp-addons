<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ay-burcu',
        HC_PLUGIN_URL . 'modules/ay-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ay-burcu-css',
        HC_PLUGIN_URL . 'modules/ay-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ay-burcu-hesaplama">
        <h3>Ay Burcu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ayburc-tarih">Doğum Tarihi</label>
            <input type="date" id="hc-ayburc-tarih">
        </div>
        <div class="hc-form-group">
            <label for="hc-ayburc-saat">Doğum Saati (Opsiyonel, bilinmiyorsa 12:00 bırakın)</label>
            <input type="time" id="hc-ayburc-saat" value="12:00">
        </div>
        <button class="hc-btn" onclick="hcAyBurcuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ay-burcu-result">
            <div class="hc-result-label">Ay Burcunuz:</div>
            <div class="hc-result-value" id="hc-ayburc-value"></div>
            <div class="hc-result-desc" id="hc-ayburc-desc"></div>
        </div>
    </div>
    <?php
}
