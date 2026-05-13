<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ozgulluk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ozgulluk-hesaplama',
        HC_PLUGIN_URL . 'modules/ozgulluk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ozgulluk-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ozgulluk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ozgulluk-hesaplama">
        <h3>Özgüllük (Specificity) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-spec-tn">Doğru Negatif Sayısı (TN)</label>
            <input type="number" id="hc-spec-tn" min="0" placeholder="Negatif olan ve negatif çıkan">
        </div>
        <div class="hc-form-group">
            <label for="hc-spec-fp">Yanlış Pozitif Sayısı (FP)</label>
            <input type="number" id="hc-spec-fp" min="0" placeholder="Negatif olan ama pozitif çıkan">
        </div>
        <button class="hc-btn" onclick="hcOzgullukHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ozgulluk-hesaplama-result">
            <span class="hc-label">Özgüllük (Specificity):</span>
            <div class="hc-result-value" id="hc-spec-res-value">0</div>
            <div id="hc-spec-res-percent"></div>
        </div>
    </div>
    <?php
}
