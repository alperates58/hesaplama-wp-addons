<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beer_lambert_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beer-lambert',
        HC_PLUGIN_URL . 'modules/beer-lambert-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beer-lambert-css',
        HC_PLUGIN_URL . 'modules/beer-lambert-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-beer-lambert">
        <h3>Beer-Lambert Yasası Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bl-a">Absorbans (A)</label>
            <input type="number" id="hc-bl-a" placeholder="Örn: 0.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bl-e">Molar Absorpsiyon Katsayısı (ε - L/mol·cm)</label>
            <input type="number" id="hc-bl-e" placeholder="Örn: 10000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bl-l">Yol Uzunluğu (l - cm)</label>
            <input type="number" id="hc-bl-l" placeholder="Örn: 1" value="1" step="any">
        </div>
        <button class="hc-btn" onclick="hcBeerHesapla()">Derişim (c) Hesapla</button>
        <div class="hc-result" id="hc-bl-result">
            <div class="hc-result-label">Derişim (c):</div>
            <div class="hc-result-value" id="hc-bl-val">-</div>
            <div class="hc-result-note">A = ε * l * c</div>
        </div>
    </div>
    <?php
}
