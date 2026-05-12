<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pizza_boyutu_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pizza-comp-js',
        HC_PLUGIN_URL . 'modules/pizza-boyutu-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pizza-comp-css',
        HC_PLUGIN_URL . 'modules/pizza-boyutu-karsilastirma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pizza-comp">
        <h3>Pizza Boyutu Karşılaştırma</h3>
        
        <div class="hc-pizza-row">
            <div class="hc-pizza-box">
                <h4>Pizza A</h4>
                <div class="hc-form-group">
                    <label>Çap (cm)</label>
                    <input type="number" id="hc-pc-d1" value="25">
                </div>
                <div class="hc-form-group">
                    <label>Fiyat (₺)</label>
                    <input type="number" id="hc-pc-p1" value="150">
                </div>
            </div>
            <div class="hc-pizza-box">
                <h4>Pizza B</h4>
                <div class="hc-form-group">
                    <label>Çap (cm)</label>
                    <input type="number" id="hc-pc-d2" value="33">
                </div>
                <div class="hc-form-group)
                    <label>Fiyat (₺)</label>
                    <input type="number" id="hc-pc-p2" value="220">
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcPizzaKarsilastir()">Karşılaştır</button>

        <div class="hc-result" id="hc-pizza-comp-result">
            <div id="hc-pc-res-text"></div>
        </div>
    </div>
    <?php
}
