<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yakilan_kalori_yemek_karsiligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burn-food-equiv',
        HC_PLUGIN_URL . 'modules/yakilan_kalori_yemek_karsiligi_hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-burn-equiv-calc">
        <h3>Yakılan Kalori vs Yemek</h3>
        <div class="hc-form-group">
            <label for="hc-be-cal">Yakılan Kalori (kcal):</label>
            <input type="number" id="hc-be-cal" placeholder="500">
        </div>
        <button class="hc-btn" onclick="hcBurnEquivHesapla()">Karşılaştır</button>
        <div class="hc-result" id="hc-burn-equiv-result">
            <strong>Eşdeğer Yiyecekler:</strong>
            <div id="hc-be-res-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
