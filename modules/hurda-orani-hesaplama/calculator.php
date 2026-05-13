<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hurda_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hurda-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/hurda-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hurda-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hurda-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hurda-orani">
        <h3>Hurda Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-scrap-total">Toplam Üretilen Miktar (Adet/kg):</label>
            <input type="number" id="hc-scrap-total" class="hc-input" placeholder="Örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-scrap-count">Hurda Miktarı (Adet/kg):</label>
            <input type="number" id="hc-scrap-count" class="hc-input" placeholder="Örn: 25">
        </div>
        <button class="hc-btn" onclick="hcHurdaOraniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hurda-orani-result">
            <div class="hc-result-label">Hurda Oranı:</div>
            <div class="hc-result-value" id="hc-res-scrap-ratio">-</div>
            <p id="hc-scrap-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
