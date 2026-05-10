<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kahve_su_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coffee-water-ratio',
        HC_PLUGIN_URL . 'modules/kahve-su-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-coffee-water-ratio-calc">
        <h3>Kahve Su Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-cw-coffee">Kahve Miktarı (g):</label>
            <input type="number" id="hc-cw-coffee" placeholder="20">
        </div>
        <div class="hc-form-group">
            <label for="hc-cw-water">Su Miktarı (ml):</label>
            <input type="number" id="hc-cw-water" placeholder="320">
        </div>
        <button class="hc-btn" onclick="hcCoffeeWaterRatioHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-coffee-water-ratio-result">
            <strong>Demleme Bilgisi:</strong>
            <div id="hc-cw-val" class="hc-result-value">-</div>
            <p id="hc-cw-desc"></p>
        </div>
    </div>
    <?php
}
