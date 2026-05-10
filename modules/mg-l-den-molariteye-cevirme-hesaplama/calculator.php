<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mg_l_den_molariteye_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mg-l-den-molariteye-cevirme-hesaplama',
        HC_PLUGIN_URL . 'modules/mg-l-den-molariteye-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mg-l-den-molariteye-cevirme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mg-l-den-molariteye-cevirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mg-to-molar">
        <h3>mg/L ➔ Molarite Dönüşümü</h3>
        <div class="hc-form-group">
            <label for="hc-mtm-val">Derişim (mg/L)</label>
            <input type="number" id="hc-mtm-val" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label for="hc-mtm-mw">Molekül Ağırlığı (g/mol)</label>
            <input type="number" id="hc-mtm-mw" placeholder="Örn: 58.44">
        </div>
        <button class="hc-btn" onclick="hcMgLDenMolariteyeÇevirmeHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-mtm-result">
            <div class="hc-result-label">Molarite (M):</div>
            <div class="hc-result-value" id="hc-mtm-res">-</div>
        </div>
    </div>
    <?php
}
