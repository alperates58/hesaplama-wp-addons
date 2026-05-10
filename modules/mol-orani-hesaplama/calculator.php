<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mol_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mol-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/mol-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mol-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mol-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mole-ratio">
        <h3>Mol Oranı Hesaplama</h3>
        <div id="hc-mr-inputs">
            <div class="hc-form-group">
                <label>Bileşen 1 Molü</label>
                <input type="number" class="hc-mr-val" placeholder="Örn: 1.5">
            </div>
            <div class="hc-form-group">
                <label>Bileşen 2 Molü</label>
                <input type="number" class="hc-mr-val" placeholder="Örn: 2.5">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcAddMoleRatioInput()" style="margin-bottom:10px;">+ Bileşen Ekle</button>
        <button class="hc-btn" onclick="hcMolOranıHesapla()">Oranları Hesapla</button>
        <div class="hc-result" id="hc-mr-result">
            <div id="hc-mr-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
