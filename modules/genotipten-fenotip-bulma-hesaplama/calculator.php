<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_genotipten_fenotip_bulma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-genotipten-fenotip-bulma-hesaplama',
        HC_PLUGIN_URL . 'modules/genotipten-fenotip-bulma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-genotipten-fenotip-bulma-hesaplama-css',
        HC_PLUGIN_URL . 'modules/genotipten-fenotip-bulma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-genotipten-fenotip-bulma-hesaplama">
        <h3>Genotipten Fenotip ve Gamet Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-gen-input">Genotip Giriniz</label>
            <input type="text" id="hc-gen-input" placeholder="Örn: AaBbccDd">
            <small style="display:block; margin-top:5px; opacity:0.7;">Büyük/küçük harf duyarlıdır. Her karakter çifti bir gen çiftini temsil eder.</small>
        </div>
        <button class="hc-btn" onclick="hcGenotipAnaliz()">Analiz Et</button>
        <div class="hc-result" id="hc-gen-analysis-result">
            <div class="hc-ga-grid">
                <div class="hc-ga-item">
                    <span class="hc-result-label">Fenotip:</span>
                    <span class="hc-result-value" id="hc-ga-pheno">-</span>
                </div>
                <div class="hc-ga-item">
                    <span class="hc-result-label">Gamet Çeşidi (2ⁿ):</span>
                    <span class="hc-result-value" id="hc-ga-gamete">-</span>
                </div>
            </div>
            <div class="hc-result-note" id="hc-ga-note"></div>
        </div>
    </div>
    <?php
}
