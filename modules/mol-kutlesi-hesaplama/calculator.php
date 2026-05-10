<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mol_kutlesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mol-kutlesi-hesaplama',
        HC_PLUGIN_URL . 'modules/mol-kutlesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mol-kutlesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mol-kutlesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-molar-mass">
        <h3>Mol Kütlesi (MA) Hesaplama</h3>
        <p style="font-size:0.9em; color:#666; margin-bottom:15px;">Örn: H2SO4, C6H12O6</p>
        <div class="hc-form-group">
            <input type="text" id="hc-mm-formula" placeholder="Formül girin..." style="font-family:monospace; font-size:1.1em;">
        </div>
        <button class="hc-btn" onclick="hcMolKütlesiHesapla()">MA Hesapla</button>
        <div class="hc-result" id="hc-mm-result">
            <div class="hc-result-label">Mol Kütlesi:</div>
            <div class="hc-result-value" id="hc-mm-val">-</div>
        </div>
    </div>
    <?php
}
