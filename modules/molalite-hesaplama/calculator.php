<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_molalite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-molalite-hesaplama',
        HC_PLUGIN_URL . 'modules/molalite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-molalite-hesaplama-css',
        HC_PLUGIN_URL . 'modules/molalite-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-molality">
        <h3>Molalite Hesaplama (m)</h3>
        <div class="hc-form-group">
            <label for="hc-mo-mol">Çözünen Molü (mol)</label>
            <input type="number" id="hc-mo-mol" placeholder="Örn: 0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-mo-mass">Çözücü Kütlesi (kg)</label>
            <input type="number" id="hc-mo-mass" placeholder="Örn: 2">
        </div>
        <button class="hc-btn" onclick="hcMolaliteHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mo-result">
            <div class="hc-result-label">Molalite (m):</div>
            <div class="hc-result-value" id="hc-mo-val">-</div>
        </div>
    </div>
    <?php
}
