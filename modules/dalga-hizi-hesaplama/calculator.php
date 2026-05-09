<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dalga_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dalga-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/dalga-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dalga-hizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dalga-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dalga-hizi-hesaplama">
        <h3>Dalga Hızı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dh-freq">Frekans (f - Hz)</label>
            <input type="number" id="hc-dh-freq" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dh-lambda">Dalga Boyu (λ - m)</label>
            <input type="number" id="hc-dh-lambda" placeholder="Örn: 2" step="any">
        </div>
        <button class="hc-btn" onclick="hcDHHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dh-result">
            <div class="hc-result-label">Dalga Hızı (v):</div>
            <div class="hc-result-value" id="hc-dh-val">-</div>
            <div class="hc-result-note">v = f * λ</div>
        </div>
    </div>
    <?php
}
