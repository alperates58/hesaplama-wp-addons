<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rna_molekul_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rna-mw',
        HC_PLUGIN_URL . 'modules/rna-molekul-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rna-mw-css',
        HC_PLUGIN_URL . 'modules/rna-molekul-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rna-mw">
        <h3>RNA Molekül Ağırlığı</h3>
        <div class="hc-form-group">
            <label for="hc-rmw-seq">RNA Dizisi (A, U, G, C):</label>
            <textarea id="hc-rmw-seq" placeholder="AUGC..." style="width:100%; height:80px; text-transform: uppercase;"></textarea>
        </div>
        <button class="hc-btn" onclick="hcRnaMwHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rna-mw-result">
            <strong>Tahmini Molekül Ağırlığı:</strong>
            <div id="hc-rmw-res-val" class="hc-result-value">-</div>
            <span>Dalton (Da)</span>
        </div>
    </div>
    <?php
}
