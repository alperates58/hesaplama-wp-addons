<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pizza_malzeme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pizza-ingredients-js',
        HC_PLUGIN_URL . 'modules/pizza-malzeme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pizza-ingredients-css',
        HC_PLUGIN_URL . 'modules/pizza-malzeme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pizza-ingredients">
        <h3>Pizza Malzeme Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pi-count">Pizza Adedi</label>
            <input type="number" id="hc-pi-count" value="1" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-pi-diameter">Pizza Çapı (cm)</label>
            <input type="number" id="hc-pi-diameter" value="30" min="10">
        </div>

        <button class="hc-btn" onclick="hcPizzaMalzemeHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pizza-ingredients-result">
            <div id="hc-pi-res-list">
                <!-- JS populated -->
            </div>
        </div>
    </div>
    <?php
}
