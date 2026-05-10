<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_inc_kup_metrekup_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cuin-to-cum',
        HC_PLUGIN_URL . 'modules/inc-kup-metrekup-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cuin-to-cum-css',
        HC_PLUGIN_URL . 'modules/inc-kup-metrekup-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cuin-cum">
        <h3>İnç Küp → Metreküp</h3>
        <div class="hc-form-group">
            <label for="hc-ic-val">İnç Küp (cu in):</label>
            <input type="number" id="hc-ic-val" step="any" placeholder="1000">
        </div>
        <button class="hc-btn" onclick="hcCuinToCumHesapla()">Çevir</button>
        <div class="hc-result" id="hc-cuin-cum-result">
            <strong>Sonuç (Metreküp):</strong>
            <div id="hc-ic-res-val" class="hc-result-value">-</div>
            <span>m³</span>
        </div>
    </div>
    <?php
}
