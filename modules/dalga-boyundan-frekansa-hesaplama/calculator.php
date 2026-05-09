<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dalga_boyundan_frekansa_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dalga-boyundan-frekansa-hesaplama',
        HC_PLUGIN_URL . 'modules/dalga-boyundan-frekansa-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dalga-boyundan-frekansa-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dalga-boyundan-frekansa-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dalga-boyundan-frekansa-hesaplama">
        <h3>Dalga Boyundan Frekansa Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dbf-speed">Dalga Hızı (v - m/s)</label>
            <input type="number" id="hc-dbf-speed" value="299792458" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dbf-lambda">Dalga Boyu (λ - m)</label>
            <input type="number" id="hc-dbf-lambda" placeholder="Örn: 0.5" step="any">
        </div>
        <button class="hc-btn" onclick="hcDBFHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dbf-result">
            <div class="hc-result-label">Frekans (f):</div>
            <div class="hc-result-value" id="hc-dbf-val">-</div>
            <div class="hc-result-note">f = v / λ</div>
        </div>
    </div>
    <?php
}
