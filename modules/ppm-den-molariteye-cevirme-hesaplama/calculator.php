<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ppm_den_molariteye_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ppm-den-molariteye-cevirme-hesaplama',
        HC_PLUGIN_URL . 'modules/ppm-den-molariteye-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ppm-den-molariteye-cevirme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ppm-den-molariteye-cevirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ppm-to-molar">
        <h3>ppm ➔ Molarite Dönüşümü</h3>
        <div class="hc-form-group">
            <label for="hc-ptm-val">Derişim (ppm)</label>
            <input type="number" id="hc-ptm-val" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-ptm-mw">Molekül Ağırlığı (g/mol)</label>
            <input type="number" id="hc-ptm-mw" placeholder="Örn: 58.44">
        </div>
        <button class="hc-btn" onclick="hcPpmDenMolariteyeÇevirmeHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-ptm-result">
            <div class="hc-result-label">Molarite (M):</div>
            <div class="hc-result-value" id="hc-ptm-res">-</div>
            <p style="font-size:0.8em; color:#666; margin-top:10px;">*Not: Sulu çözeltiler için 1 ppm ≈ 1 mg/L kabul edilir.</p>
        </div>
    </div>
    <?php
}
