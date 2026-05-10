<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kot_pantolon_bedeni_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kot-pantolon-bedeni-hesaplama',
        HC_PLUGIN_URL . 'modules/kot-pantolon-bedeni-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kot-pantolon-bedeni-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kot-pantolon-bedeni-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-jeans">
        <h3>Kot Pantolon Bedeni (W/L)</h3>
        <div class="hc-form-group">
            <label for="hc-jeans-waist">Bel Ölçüsü (cm)</label>
            <input type="number" id="hc-jeans-waist" placeholder="Göbek deliği hizası">
        </div>
        <div class="hc-form-group">
            <label for="hc-jeans-length">İç Bacak Boyu (cm)</label>
            <input type="number" id="hc-jeans-length" placeholder="Ağdan bileğe kadar">
        </div>
        <button class="hc-btn" onclick="hcKotPantolonBedeniHesapla()">Bedeni Bul</button>
        <div class="hc-result" id="hc-jeans-result">
            <div class="hc-result-label">Önerilen Kot Bedeni:</div>
            <div class="hc-result-value" id="hc-jeans-val">-</div>
            <p style="font-size: 0.85em; margin-top: 10px;">*W (Waist/Bel) ve L (Length/Boy) inç cinsinden standart ölçülerdir.</p>
        </div>
    </div>
    <?php
}
