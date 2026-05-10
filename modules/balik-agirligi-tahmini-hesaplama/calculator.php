<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_balik_agirligi_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fish-weight',
        HC_PLUGIN_URL . 'modules/balik-agirligi-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fish-weight-css',
        HC_PLUGIN_URL . 'modules/balik-agirligi-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fish-weight">
        <h3>Balık Ağırlığı Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-fw-len">Balık Boyu (cm):</label>
            <input type="number" id="hc-fw-len" placeholder="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-fw-girth">Balık Çevresi / Karın Genişliği (cm):</label>
            <input type="number" id="hc-fw-girth" placeholder="30">
        </div>
        <button class="hc-btn" onclick="hcFishWeightHesapla()">Ağırlığı Tahmin Et</button>
        <div class="hc-result" id="hc-fish-weight-result">
            <strong>Tahmini Ağırlık:</strong>
            <div id="hc-fw-res-val" class="hc-result-value">-</div>
            <span>Gram (g)</span>
        </div>
    </div>
    <?php
}
