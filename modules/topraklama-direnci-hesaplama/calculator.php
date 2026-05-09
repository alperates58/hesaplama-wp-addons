<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_topraklama_direnci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ground-resistance',
        HC_PLUGIN_URL . 'modules/topraklama-direnci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ground-resistance-css',
        HC_PLUGIN_URL . 'modules/topraklama-direnci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ground-resistance">
        <h3>Topraklama Direnci (Tek Çubuk)</h3>
        <div class="hc-form-group">
            <label for="hc-gr-rho">Toprak Özgül Direnci (ρ) [Ω.m]</label>
            <input type="number" id="hc-gr-rho" value="100">
            <small>Örn: Nemli toprak 50-100</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-gr-l">Çubuk Uzunluğu (L) [m]</label>
            <input type="number" id="hc-gr-l" value="2" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-gr-r">Çubuk Yarıçapı (r) [m]</label>
            <input type="number" id="hc-gr-r" value="0.01" step="0.001">
        </div>
        <button class="hc-btn" onclick="hcGroundResistanceHesapla()">Direnci Hesapla</button>
        <div class="hc-result" id="hc-ground-resistance-result">
            <div class="hc-result-item">
                <span>Tahmini Direnç (R):</span>
                <span class="hc-result-value" id="hc-res-gr-val">0 Ω</span>
            </div>
            <p class="hc-gr-note">R = (ρ / 2πL) * [ln(4L/r) - 1]</p>
        </div>
    </div>
    <?php
}
