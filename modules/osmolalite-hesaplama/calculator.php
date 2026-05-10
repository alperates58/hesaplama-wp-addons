<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_osmolalite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-osmolalite-hesaplama',
        HC_PLUGIN_URL . 'modules/osmolalite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-osmolalite-hesaplama-css',
        HC_PLUGIN_URL . 'modules/osmolalite-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-osmolality">
        <h3>Osmolalite Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-om-mol">Molalite (m, mol/kg)</label>
            <input type="number" id="hc-om-mol" placeholder="Örn: 0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-om-i">Van't Hoff Faktörü (i)</label>
            <input type="number" id="hc-om-i" value="1" min="1">
        </div>
        <button class="hc-btn" onclick="hcOsmolaliteHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-om-result">
            <div class="hc-result-label">Osmolalite:</div>
            <div class="hc-result-value" id="hc-om-val">-</div>
        </div>
    </div>
    <?php
}
