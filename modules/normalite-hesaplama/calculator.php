<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_normalite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-normalite-hesaplama',
        HC_PLUGIN_URL . 'modules/normalite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-normalite-hesaplama-css',
        HC_PLUGIN_URL . 'modules/normalite-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-normality">
        <h3>Normalite Hesaplama (N)</h3>
        <div class="hc-form-group">
            <label for="hc-no-molar">Molarite (M)</label>
            <input type="number" id="hc-no-molar" placeholder="Örn: 0.1" step="0.001">
        </div>
        <div class="hc-form-group">
            <label for="hc-no-valency">Tesir Değerliği (n)</label>
            <input type="number" id="hc-no-valency" value="1" min="1">
        </div>
        <button class="hc-btn" onclick="hcNormaliteHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-no-result">
            <div class="hc-result-label">Normalite (N):</div>
            <div class="hc-result-value" id="hc-no-val">-</div>
        </div>
    </div>
    <?php
}
