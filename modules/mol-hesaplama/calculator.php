<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mol_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mol-hesaplama',
        HC_PLUGIN_URL . 'modules/mol-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mol-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mol-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mole">
        <h3>Mol Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mol-mass">Kütle (m, gram)</label>
            <input type="number" id="hc-mol-mass" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-mol-mw">Mol Kütlesi (MA, g/mol)</label>
            <input type="number" id="hc-mol-mw" placeholder="Örn: 58.44">
        </div>
        <button class="hc-btn" onclick="hcMolHesapla()">Molü Hesapla</button>
        <div class="hc-result" id="hc-mol-result">
            <div class="hc-result-label">Mol Sayısı (n):</div>
            <div class="hc-result-value" id="hc-mol-val">-</div>
        </div>
    </div>
    <?php
}
