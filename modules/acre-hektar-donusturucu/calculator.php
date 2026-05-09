<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_acre_hektar_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-acre-hektar-donusturucu',
        HC_PLUGIN_URL . 'modules/acre-hektar-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-acre-hektar-donusturucu-css',
        HC_PLUGIN_URL . 'modules/acre-hektar-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-acre-hektar-donusturucu">
        <h3>Acre Hektar Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-ahd-acre">Acre (ac)</label>
            <input type="number" id="hc-ahd-acre" placeholder="ac" step="any" oninput="hcAcreToHa()">
        </div>
        <div class="hc-form-group">
            <label for="hc-ahd-ha">Hektar (ha)</label>
            <input type="number" id="hc-ahd-ha" placeholder="ha" step="any" oninput="hcHaToAcre()">
        </div>
        <div class="hc-result" id="hc-acre-hektar-donusturucu-result">
            <div id="hc-ahd-summary"></div>
        </div>
    </div>
    <?php
}
