<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_patlamis_misir_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-popcorn-amount',
        HC_PLUGIN_URL . 'modules/patlamis-misir-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-popcorn-calc">
        <h3>Patlamış Mısır Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-pop-dry">Kuru Mısır (g):</label>
            <input type="number" id="hc-pop-dry" placeholder="100">
            <small>Örn: Yarım su bardağı ~100g</small>
        </div>
        <button class="hc-btn" onclick="hcPopcornAmountHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-popcorn-result">
            <strong>Sonuç:</strong>
            <div id="hc-pop-val" class="hc-result-value">-</div>
            <p id="hc-pop-info"></p>
        </div>
    </div>
    <?php
}
