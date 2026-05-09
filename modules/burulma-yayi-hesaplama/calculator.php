<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burulma_yayi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burulma-yayi-hesaplama',
        HC_PLUGIN_URL . 'modules/burulma-yayi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burulma-yayi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/burulma-yayi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burulma-yayi-hesaplama">
        <h3>Burulma Yayı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-by-k">Burulma Sabiti (k - N·m/rad)</label>
            <input type="number" id="hc-by-k" placeholder="Örn: 5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-by-angle">Burulma Açısı (Derece)</label>
            <input type="number" id="hc-by-angle" placeholder="Örn: 90" step="any">
        </div>
        <button class="hc-btn" onclick="hcBYHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-by-result">
            <div class="hc-result-label">Uygulanan Tork (τ):</div>
            <div class="hc-result-value" id="hc-by-val">-</div>
            <div class="hc-result-note">τ = k * θ (θ radyan cinsinden)</div>
        </div>
    </div>
    <?php
}
