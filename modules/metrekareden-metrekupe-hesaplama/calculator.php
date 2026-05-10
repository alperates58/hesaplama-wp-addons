<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_metrekareden_metrekupe_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sqm-to-cum',
        HC_PLUGIN_URL . 'modules/metrekareden-metrekupe-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sqm-to-cum-css',
        HC_PLUGIN_URL . 'modules/metrekareden-metrekupe-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sqm-cum">
        <h3>m²'den m³'e (Hacim) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sc-area">Alan (m²):</label>
            <input type="number" id="hc-sc-area" step="0.1" placeholder="10.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-sc-depth">Derinlik / Kalınlık (cm):</label>
            <input type="number" id="hc-sc-depth" step="0.1" placeholder="10.0">
        </div>
        <button class="hc-btn" onclick="hcSqmToCumHesapla()">Hacmi Hesapla</button>
        <div class="hc-result" id="hc-sqm-cum-result">
            <strong>Toplam Hacim:</strong>
            <div id="hc-sc-res-val" class="hc-result-value">-</div>
            <span>Metreküp (m³)</span>
        </div>
    </div>
    <?php
}
