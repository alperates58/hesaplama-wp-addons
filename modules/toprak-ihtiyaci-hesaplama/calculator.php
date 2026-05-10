<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_toprak_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-soil-vol',
        HC_PLUGIN_URL . 'modules/toprak-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-soil-vol-css',
        HC_PLUGIN_URL . 'modules/toprak-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-soil-vol">
        <h3>Toprak / Dolgu Hacmi</h3>
        <div class="hc-form-group">
            <label for="hc-sv-area">Alan (m²):</label>
            <input type="number" id="hc-sv-area" placeholder="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-sv-depth">Derinlik (cm):</label>
            <input type="number" id="hc-sv-depth" placeholder="20">
        </div>
        <button class="hc-btn" onclick="hcSoilVolHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-soil-vol-result">
            <strong>Gereken Hacim:</strong>
            <div id="hc-sv-res-val" class="hc-result-value">-</div>
            <span>m³ (Metreküp)</span>
        </div>
    </div>
    <?php
}
