<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tohum_ekim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-seed-rate',
        HC_PLUGIN_URL . 'modules/tohum-ekim-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-seed-rate-css',
        HC_PLUGIN_URL . 'modules/tohum-ekim-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-seed-rate">
        <h3>Tohum Ekim Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-sr-area">Ekim Alanı (m²):</label>
            <input type="number" id="hc-sr-area" placeholder="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-sr-target">Hedef Tohum Miktarı (kg / dekar):</label>
            <input type="number" id="hc-sr-target" placeholder="20">
            <small>1 dekar = 1000 m².</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-sr-germ">Çimlenme Oranı (%):</label>
            <input type="number" id="hc-sr-germ" placeholder="95">
        </div>
        <button class="hc-btn" onclick="hcSeedRateHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-seed-rate-result">
            <strong>Gereken Tohum:</strong>
            <div id="hc-sr-res-val" class="hc-result-value">-</div>
            <span>kg</span>
        </div>
    </div>
    <?php
}
