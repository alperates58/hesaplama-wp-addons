<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_eozinofil_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-eozinofil-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/eozinofil-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-eozinofil-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/eozinofil-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-eosinophil">
        <h3>Mutlak Eozinofil Sayısı</h3>
        <div class="hc-form-group">
            <label for="hc-eo-wbc">WBC (Beyaz Küre) (hücre/µL)</label>
            <input type="number" id="hc-eo-wbc" placeholder="7000">
        </div>
        <div class="hc-form-group">
            <label for="hc-eo-perc">Eozinofil Oranı (%)</label>
            <input type="number" id="hc-eo-perc" placeholder="3">
        </div>
        <button class="hc-btn" onclick="hcEozinofilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-eo-result">
            <div class="hc-result-label">Mutlak Sayı:</div>
            <div class="hc-result-value" id="hc-eo-val">-</div>
            <p id="hc-eo-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
