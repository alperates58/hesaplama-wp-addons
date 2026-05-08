<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dpi_piksel_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-dpi-piksel-donusturucu',
        HC_PLUGIN_URL . 'modules/dpi-piksel-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dpi-piksel-donusturucu-css',
        HC_PLUGIN_URL . 'modules/dpi-piksel-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dpi-piksel-donusturucu">
        <h3>DPI Piksel Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-dpd-inch">Fiziksel Boyut (İnç)</label>
            <input type="number" id="hc-dpd-inch" placeholder="Örn: 10" step="any" oninput="hcDpiPikselHesapla()">
        </div>
        <div class="hc-form-group">
            <label for="hc-dpd-dpi">DPI (Çözünürlük)</label>
            <input type="number" id="hc-dpd-dpi" placeholder="Örn: 72, 300" step="any" oninput="hcDpiPikselHesapla()">
        </div>
        <div class="hc-result" id="hc-dpi-piksel-donusturucu-result">
            <div id="hc-dpd-output"></div>
        </div>
    </div>
    <?php
}
