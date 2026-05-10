<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ikiler_tumleyeni_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-twos-comp',
        HC_PLUGIN_URL . 'modules/ikiler-tumleyeni-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-twos-comp-css',
        HC_PLUGIN_URL . 'modules/ikiler-tumleyeni-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-twos">
        <h3>İkiler Tümleyeni Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ts-bin">İkili Sayı (Binary):</label>
            <input type="text" id="hc-ts-bin" placeholder="1011">
        </div>
        <button class="hc-btn" onclick="hcTwosCompHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-twos-result">
            <div class="hc-ts-row">
                <strong>Birler Tümleyeni:</strong>
                <span id="hc-ts-ones">-</span>
            </div>
            <div class="hc-ts-row">
                <strong>İkiler Tümleyeni:</strong>
                <span id="hc-ts-twos" class="hc-result-value">-</span>
            </div>
        </div>
    </div>
    <?php
}
