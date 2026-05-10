<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ast_alt_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ast-alt-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/ast-alt-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ast-alt-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ast-alt-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-de-ritis">
        <h3>AST / ALT Oranı (De Ritis)</h3>
        <div class="hc-form-group">
            <label for="hc-aa-ast">AST (U/L)</label>
            <input type="number" id="hc-aa-ast" placeholder="Örn: 40">
        </div>
        <div class="hc-form-group">
            <label for="hc-aa-alt">ALT (U/L)</label>
            <input type="number" id="hc-aa-alt" placeholder="Örn: 35">
        </div>
        <button class="hc-btn" onclick="hcASTALTOranıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-aa-result">
            <div class="hc-result-label">De Ritis Oranı:</div>
            <div class="hc-result-value" id="hc-aa-val">-</div>
            <p id="hc-aa-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
