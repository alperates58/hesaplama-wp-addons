<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gibbs_serbest_enerjisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gibbs',
        HC_PLUGIN_URL . 'modules/gibbs-serbest-enerjisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gibbs-css',
        HC_PLUGIN_URL . 'modules/gibbs-serbest-enerjisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gibbs">
        <h3>Gibbs Serbest Enerjisi (ΔG) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-g-h">Entalpi Değişimi (ΔH - kJ/mol)</label>
            <input type="number" id="hc-g-h" placeholder="Örn: -100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-g-s">Entropi Değişimi (ΔS - J/mol·K)</label>
            <input type="number" id="hc-g-s" placeholder="Örn: 200" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-g-t">Sıcaklık (T - °C)</label>
            <input type="number" id="hc-g-t" placeholder="Örn: 25" step="any">
        </div>
        <button class="hc-btn" onclick="hcGibbsHesapla()">ΔG Hesapla</button>
        <div class="hc-result" id="hc-g-result">
            <div class="hc-result-label">Gibbs Serbest Enerjisi (ΔG):</div>
            <div class="hc-result-value" id="hc-g-val">-</div>
            <div class="hc-g-interpretation" id="hc-g-desc"></div>
            <div class="hc-result-note">Formül: ΔG = ΔH - T * ΔS</div>
        </div>
    </div>
    <?php
}
