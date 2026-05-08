<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mmhg_kpa_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-mmhg-kpa-donusturucu',
        HC_PLUGIN_URL . 'modules/mmhg-kpa-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mmhg-kpa-donusturucu-css',
        HC_PLUGIN_URL . 'modules/mmhg-kpa-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mmhg-kpa-donusturucu">
        <h3>mmHg kPa Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-mkd-mmhg">mmHg (Milimetre Cıva)</label>
            <input type="number" id="hc-mkd-mmhg" placeholder="mmHg" step="any" oninput="hcMmhgToKpa()">
        </div>
        <div class="hc-form-group">
            <label for="hc-mkd-kpa">Kilopascal (kPa)</label>
            <input type="number" id="hc-mkd-kpa" placeholder="kPa" step="any" oninput="hcKpaToMmhg()">
        </div>
        <div class="hc-result" id="hc-mmhg-kpa-donusturucu-result">
            <div id="hc-mkd-summary"></div>
        </div>
    </div>
    <?php
}
