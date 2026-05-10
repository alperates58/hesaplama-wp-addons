<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kahve_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coffee-ratio',
        HC_PLUGIN_URL . 'modules/kahve-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-coffee-ratio-calc">
        <h3>Kahve Oranı (Brew Ratio)</h3>
        <div class="hc-form-group">
            <label for="hc-ratio-flour">Kahve Miktarı (g):</label>
            <input type="number" id="hc-ratio-coffee" placeholder="15">
        </div>
        <div class="hc-form-group">
            <label for="hc-ratio-water">Su Miktarı (ml):</label>
            <input type="number" id="hc-ratio-water" placeholder="250">
        </div>
        <div class="hc-form-group">
            <label for="hc-ratio-target">Hedef Oran (1:X):</label>
            <input type="number" id="hc-ratio-target" placeholder="16" step="0.5">
            <small>Filtre için genelde 1:15 - 1:17</small>
        </div>
        <button class="hc-btn" onclick="hcCoffeeRatioHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-coffee-ratio-result">
            <strong>Önerilen Ayar:</strong>
            <div id="hc-ratio-val" class="hc-result-value">-</div>
            <p id="hc-ratio-desc"></p>
        </div>
    </div>
    <?php
}
