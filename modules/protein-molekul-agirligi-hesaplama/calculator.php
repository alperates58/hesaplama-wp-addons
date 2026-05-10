<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_protein_molekul_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-protein-mw',
        HC_PLUGIN_URL . 'modules/protein-molekul-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-protein-mw-css',
        HC_PLUGIN_URL . 'modules/protein-molekul-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-protein-mw">
        <h3>Protein Molekül Ağırlığı</h3>
        <div class="hc-form-group">
            <label for="hc-pmw-seq">Amino Asit Dizisi (Tek Harf):</label>
            <textarea id="hc-pmw-seq" placeholder="MKWVTFISLL..." style="width:100%; height:80px; text-transform: uppercase;"></textarea>
        </div>
        <button class="hc-btn" onclick="hcProteinMwHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-protein-mw-result">
            <strong>Tahmini Molekül Ağırlığı:</strong>
            <div id="hc-pmw-res-val" class="hc-result-value">-</div>
            <span>Dalton (Da)</span>
            <div id="hc-pmw-res-kDa" style="margin-top:5px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
