<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dekar_metrekare_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-dekar-metrekare-donusturucu',
        HC_PLUGIN_URL . 'modules/dekar-metrekare-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dekar-metrekare-donusturucu-css',
        HC_PLUGIN_URL . 'modules/dekar-metrekare-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dekar-metrekare-donusturucu">
        <h3>Dekar Metrekare Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-dmd-dekar">Dekar (dönüm)</label>
            <input type="number" id="hc-dmd-dekar" placeholder="dekar" step="any" oninput="hcDekarToM2()">
        </div>
        <div class="hc-form-group">
            <label for="hc-dmd-m2">Metrekare (m²)</label>
            <input type="number" id="hc-dmd-m2" placeholder="m²" step="any" oninput="hcM2ToDekar()">
        </div>
        <div class="hc-result" id="hc-dekar-metrekare-donusturucu-result">
            <div id="hc-dmd-summary"></div>
        </div>
    </div>
    <?php
}
