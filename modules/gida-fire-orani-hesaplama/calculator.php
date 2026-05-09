<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gida_fire_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-food-waste',
        HC_PLUGIN_URL . 'modules/gida-fire-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-food-waste-css',
        HC_PLUGIN_URL . 'modules/gida-fire-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-food-waste">
        <h3>Gıda Fire Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-fw-gross">Brüt Ağırlık (gr/kg)</label>
            <input type="number" id="hc-fw-gross" value="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-fw-net">Net Ağırlık (gr/kg)</label>
            <input type="number" id="hc-fw-net" value="800">
        </div>
        <button class="hc-btn" onclick="hcFoodWasteHesapla()">Fire Oranını Gör</button>
        <div class="hc-result" id="hc-food-waste-result">
            <div class="hc-result-item">
                <span>Fire Oranı:</span>
                <span class="hc-result-value" id="hc-res-fw-perc">%0</span>
            </div>
            <div class="hc-result-item">
                <span>Atık Miktarı:</span>
                <span id="hc-res-fw-amount">0</span>
            </div>
        </div>
    </div>
    <?php
}
