<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dalga_boyu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dalga-boyu-hesaplama',
        HC_PLUGIN_URL . 'modules/dalga-boyu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dalga-boyu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dalga-boyu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dalga-boyu-hesaplama">
        <h3>Dalga Boyu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-db-speed">Dalga Hızı (v - m/s)</label>
            <input type="number" id="hc-db-speed" placeholder="Örn: 343 (Ses)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-db-freq">Frekans (f - Hz)</label>
            <input type="number" id="hc-db-freq" placeholder="Örn: 440" step="any">
        </div>
        <button class="hc-btn" onclick="hcDBHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-db-result">
            <div class="hc-result-label">Dalga Boyu (λ):</div>
            <div class="hc-result-value" id="hc-db-val">-</div>
            <div class="hc-result-note">λ = v / f</div>
        </div>
    </div>
    <?php
}
