<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fit_kare_metrekare_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-fit-kare-metrekare-donusturucu',
        HC_PLUGIN_URL . 'modules/fit-kare-metrekare-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fit-kare-metrekare-donusturucu-css',
        HC_PLUGIN_URL . 'modules/fit-kare-metrekare-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fit-kare-metrekare-donusturucu">
        <h3>Fit Kare Metrekare Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-fkmd-sqft">Fit Kare (sq ft)</label>
            <input type="number" id="hc-fkmd-sqft" placeholder="sq ft" step="any" oninput="hcSqftToM2()">
        </div>
        <div class="hc-form-group">
            <label for="hc-fkmd-m2">Metrekare (m²)</label>
            <input type="number" id="hc-fkmd-m2" placeholder="m²" step="any" oninput="hcM2ToSqft()">
        </div>
        <div class="hc-result" id="hc-fit-kare-metrekare-donusturucu-result">
            <div id="hc-fkmd-summary"></div>
        </div>
    </div>
    <?php
}
