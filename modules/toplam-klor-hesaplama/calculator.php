<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_toplam_klor_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-toplam-klor-hesaplama',
        HC_PLUGIN_URL . 'modules/toplam-klor-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-toplam-klor-hesaplama-css',
        HC_PLUGIN_URL . 'modules/toplam-klor-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-total-chlorine">
        <h3>Toplam Klor Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-tc-free">Serbest Klor (mg/L)</label>
            <input type="number" id="hc-tc-free" placeholder="Örn: 1.0" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-tc-total">Toplam Klor (mg/L)</label>
            <input type="number" id="hc-tc-total" placeholder="Örn: 1.5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcToplamKlorHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tc-result">
            <div id="hc-tc-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
