<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yarim_tarif_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-half-recipe',
        HC_PLUGIN_URL . 'modules/yarim-tarif-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-half-recipe-calc">
        <h3>Yarım Tarif Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-hr-val">Orijinal Miktar:</label>
            <input type="number" id="hc-hr-val" placeholder="250" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcHalfRecipeHesapla()">Yarıya Böl</button>
        <div class="hc-result" id="hc-half-recipe-result">
            <strong>Yeni Miktar:</strong>
            <div id="hc-hr-res" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
