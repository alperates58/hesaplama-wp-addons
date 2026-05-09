<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yol_egim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-road-slope',
        HC_PLUGIN_URL . 'modules/yol-egim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-road-slope-css',
        HC_PLUGIN_URL . 'modules/yol-egim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-road-slope">
        <h3>Yol Eğim Hesaplayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-rs-rise">Yükseklik Farkı (Rise) [m]</label>
            <input type="number" id="hc-rs-rise" value="10" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-rs-run">Yatay Mesafe (Run) [m]</label>
            <input type="number" id="hc-rs-run" value="100" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcRoadSlopeHesapla()">Eğimi Hesapla</button>
        <div class="hc-result" id="hc-road-slope-result">
            <div class="hc-result-item">
                <span>Eğim Yüzdesi:</span>
                <span class="hc-result-value" id="hc-res-rs-perc">%0</span>
            </div>
            <div class="hc-result-item">
                <span>Eğim Açısı:</span>
                <span id="hc-res-rs-deg">0°</span>
            </div>
        </div>
    </div>
    <?php
}
