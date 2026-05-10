<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yapisal_formul_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yapisal-formul-hesaplama',
        HC_PLUGIN_URL . 'modules/yapisal-formul-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yapisal-formul-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yapisal-formul-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-struct-formula">
        <h3>Yapısal Formül Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-sf-input">Kapalı Formül (Örn: C2H6O)</label>
            <input type="text" id="hc-sf-input" placeholder="C2H6O">
        </div>
        <button class="hc-btn" onclick="hcYapısalFormülHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-sf-result">
            <div id="hc-sf-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
