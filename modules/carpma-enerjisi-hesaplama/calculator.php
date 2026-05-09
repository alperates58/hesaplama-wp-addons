<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_carpma_enerjisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-carpma-enerjisi-hesaplama',
        HC_PLUGIN_URL . 'modules/carpma-enerjisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-carpma-enerjisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/carpma-enerjisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-carpma-enerjisi-hesaplama">
        <h3>Çarpma (Kinetik) Enerjisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ce-mass">Kütle (m - kg)</label>
            <input type="number" id="hc-ce-mass" placeholder="Örn: 1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ce-speed">Hız (v - m/s)</label>
            <input type="number" id="hc-ce-speed" placeholder="Örn: 10" step="any">
        </div>
        <button class="hc-btn" onclick="hcCEHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ce-result">
            <div class="hc-result-label">Çarpma Enerjisi (E):</div>
            <div class="hc-result-value" id="hc-ce-val">-</div>
            <div class="hc-result-note">E = 0.5 * m * v²</div>
        </div>
    </div>
    <?php
}
