<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tuzluluk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tuzluluk-hesaplama',
        HC_PLUGIN_URL . 'modules/tuzluluk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tuzluluk-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tuzluluk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-salinity">
        <h3>Tuzluluk Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sl-ec">İletkenlik (EC, μS/cm)</label>
            <input type="number" id="hc-sl-ec" placeholder="Örn: 50000 (Deniz suyu)">
        </div>
        <button class="hc-btn" onclick="hcTuzlulukHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sl-result">
            <div class="hc-result-label">Tahmini Tuzluluk (ppt):</div>
            <div class="hc-result-value" id="hc-sl-val">-</div>
        </div>
    </div>
    <?php
}
