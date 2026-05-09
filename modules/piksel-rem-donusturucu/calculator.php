<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_piksel_rem_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-piksel-rem-donusturucu',
        HC_PLUGIN_URL . 'modules/piksel-rem-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-piksel-rem-donusturucu-css',
        HC_PLUGIN_URL . 'modules/piksel-rem-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-piksel-rem-donusturucu">
        <h3>Piksel REM Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-prd-base">Temel Font Boyutu (px)</label>
            <input type="number" id="hc-prd-base" value="16" step="any" oninput="hcPxRemUpdate()">
            <small style="color:#667085;">Genellikle 16px olarak kabul edilir.</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-prd-px">Piksel (px)</label>
            <input type="number" id="hc-prd-px" placeholder="px" step="any" oninput="hcPxToRem()">
        </div>
        <div class="hc-form-group">
            <label for="hc-prd-rem">REM</label>
            <input type="number" id="hc-prd-rem" placeholder="rem" step="any" oninput="hcRemToPx()">
        </div>
        <div class="hc-result" id="hc-piksel-rem-donusturucu-result">
            <div id="hc-prd-summary"></div>
        </div>
    </div>
    <?php
}
