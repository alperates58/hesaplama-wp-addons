<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kuru_makarnadan_pismis_makarnaya_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dry-to-cooked-pasta-js',
        HC_PLUGIN_URL . 'modules/kuru-makarnadan-pismis-makarnaya-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dry-to-cooked-pasta-css',
        HC_PLUGIN_URL . 'modules/kuru-makarnadan-pismis-makarnaya-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dry-to-cooked-pasta">
        <h3>Kuru → Pişmiş Makarna</h3>
        
        <div class="hc-form-group">
            <label for="hc-dcp-grams">Kuru Makarna Miktarı (Gram)</label>
            <input type="number" id="hc-dcp-grams" value="500" step="50">
        </div>

        <button class="hc-btn" onclick="hcMakarnaPisir()">Hesapla</button>

        <div class="hc-result" id="hc-dry-to-cooked-pasta-result">
            <div class="hc-result-item">
                <span>Tahmini Pişmiş Ağırlık:</span>
                <strong class="hc-result-value" id="hc-dcp-res-val">-</strong>
            </div>
            <div class="hc-result-note">Makarna türüne ve pişme süresine (al dente vb.) göre sonuç %10-15 değişkenlik gösterebilir.</div>
        </div>
    </div>
    <?php
}
