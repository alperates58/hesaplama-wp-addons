<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kuru_makarnadan_pismis_makarnaya_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pasta-conv',
        HC_PLUGIN_URL . 'modules/kuru-makarnadan-pismis-makarnaya-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pasta-conv-calc">
        <h3>Kuru Makarnadan Pişmişe Çevirme</h3>
        <div class="hc-form-group">
            <label for="hc-pasta-dry">Kuru Makarna Miktarı (g):</label>
            <input type="number" id="hc-pasta-dry" placeholder="500">
        </div>
        <button class="hc-btn" onclick="hcPastaConvHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pasta-conv-result">
            <strong>Tahmini Pişmiş Ağırlık:</strong>
            <div id="hc-pasta-cooked" class="hc-result-value">-</div>
            <p id="hc-pasta-servings-info"></p>
        </div>
    </div>
    <?php
}
