<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_arrhenius_denklemi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-arrhenius',
        HC_PLUGIN_URL . 'modules/arrhenius-denklemi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-arrhenius-css',
        HC_PLUGIN_URL . 'modules/arrhenius-denklemi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-arrhenius">
        <h3>Arrhenius Denklemi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-arr-a">Frekans Faktörü (A)</label>
            <input type="number" id="hc-arr-a" placeholder="Örn: 1e11" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-arr-ea">Aktivasyon Enerjisi (Ea - kJ/mol)</label>
            <input type="number" id="hc-arr-ea" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-arr-t">Sıcaklık (T - °C)</label>
            <input type="number" id="hc-arr-t" placeholder="Örn: 25" step="any">
        </div>
        <button class="hc-btn" onclick="hcArrheniusHesapla()">Hız Sabiti (k) Hesapla</button>
        <div class="hc-result" id="hc-arr-result">
            <div class="hc-result-label">Hız Sabiti (k):</div>
            <div class="hc-result-value" id="hc-arr-val">-</div>
            <div class="hc-result-note">k = A * e^(-Ea / (R * T))</div>
        </div>
    </div>
    <?php
}
