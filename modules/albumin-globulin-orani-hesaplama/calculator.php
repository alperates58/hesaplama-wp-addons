<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_albumin_globulin_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-albumin-globulin-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/albumin-globulin-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-albumin-globulin-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/albumin-globulin-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ag-ratio">
        <h3>Albümin / Globulin (A/G) Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-ag-total">Toplam Protein (g/dL)</label>
            <input type="number" id="hc-ag-total" placeholder="7.0" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ag-alb">Albümin (g/dL)</label>
            <input type="number" id="hc-ag-alb" placeholder="4.2" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcAGOranıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ag-result">
            <div class="hc-result-label">A/G Oranı:</div>
            <div class="hc-result-value" id="hc-ag-val">-</div>
            <p id="hc-ag-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
