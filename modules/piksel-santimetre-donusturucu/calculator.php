<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_piksel_santimetre_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-piksel-santimetre-donusturucu',
        HC_PLUGIN_URL . 'modules/piksel-santimetre-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-piksel-santimetre-donusturucu-css',
        HC_PLUGIN_URL . 'modules/piksel-santimetre-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-piksel-santimetre-donusturucu">
        <h3>Piksel Santimetre Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-psd-dpi">DPI (Çözünürlük)</label>
            <input type="number" id="hc-psd-dpi" value="96" step="any" oninput="hcPxCmUpdate()">
            <small style="color:#667085;">Ekran için genelde 96, baskı için 300 kullanılır.</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-psd-px">Piksel (px)</label>
            <input type="number" id="hc-psd-px" placeholder="px" step="any" oninput="hcPxToCm()">
        </div>
        <div class="hc-form-group">
            <label for="hc-psd-cm">Santimetre (cm)</label>
            <input type="number" id="hc-psd-cm" placeholder="cm" step="any" oninput="hcCmToPx()">
        </div>
        <div class="hc-result" id="hc-piksel-santimetre-donusturucu-result">
            <div id="hc-psd-summary"></div>
        </div>
    </div>
    <?php
}
