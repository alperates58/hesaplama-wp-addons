<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_osmolarite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-osmolarite-hesaplama',
        HC_PLUGIN_URL . 'modules/osmolarite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-osmolarite-hesaplama-css',
        HC_PLUGIN_URL . 'modules/osmolarite-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-osmolarity">
        <h3>Osmolarite Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-os-molar">Molarite (M, mol/L)</label>
            <input type="number" id="hc-os-molar" placeholder="Örn: 0.154">
        </div>
        <div class="hc-form-group">
            <label for="hc-os-i">Van't Hoff Faktörü (i)</label>
            <input type="number" id="hc-os-i" value="2" min="1">
        </div>
        <button class="hc-btn" onclick="hcOsmolariteHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-os-result">
            <div class="hc-result-label">Osmolarite:</div>
            <div class="hc-result-value" id="hc-os-val">-</div>
        </div>
    </div>
    <?php
}
