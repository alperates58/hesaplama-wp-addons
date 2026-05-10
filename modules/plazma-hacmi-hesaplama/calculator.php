<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_plazma_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-plazma-hacmi-hesaplama',
        HC_PLUGIN_URL . 'modules/plazma-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-plazma-hacmi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/plazma-hacmi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-plasma-vol">
        <h3>Plazma Hacmi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pv-bv">Toplam Kan Hacmi (L)</label>
            <input type="number" id="hc-pv-bv" placeholder="Örn: 5.0" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-pv-hct">Hematokrit (%)</label>
            <input type="number" id="hc-pv-hct" placeholder="Örn: 45">
        </div>
        <button class="hc-btn" onclick="hcPlazmaHacmiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pv-result">
            <div class="hc-result-label">Plazma Hacmi:</div>
            <div class="hc-result-value" id="hc-pv-val">-</div>
            <p style="font-size:0.85em; color:#666; margin-top:10px;">*Formül: Kan Hacmi * (1 - Hematokrit/100)</p>
        </div>
    </div>
    <?php
}
