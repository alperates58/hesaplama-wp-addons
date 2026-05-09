<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_surukleme_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-drag-force',
        HC_PLUGIN_URL . 'modules/surukleme-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-drag-force-css',
        HC_PLUGIN_URL . 'modules/surukleme-kuvveti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-drag-force">
        <h3>Sürükleme Kuvveti (Fd)</h3>
        <div class="hc-form-group">
            <label for="hc-df-rho">Akışkan Yoğunluğu (ρ) [kg/m³]</label>
            <input type="number" id="hc-df-rho" value="1.225">
            <small>Hava (Deniz Seviyesi): 1.225, Su: 1000</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-df-v">Hız (v) [m/s]</label>
            <input type="number" id="hc-df-v" value="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-df-cd">Sürükleme Katsayısı (Cd)</label>
            <input type="number" id="hc-df-cd" value="0.47" step="0.01">
            <small>Küre: 0.47, Otomobil: 0.25-0.35</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-df-a">Kesit Alanı (A) [m²]</label>
            <input type="number" id="hc-df-a" value="2" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcDragForceHesapla()">Kuvveti Hesapla</button>
        <div class="hc-result" id="hc-drag-force-result">
            <div class="hc-result-item">
                <span>Sürükleme Kuvveti:</span>
                <span class="hc-result-value" id="hc-res-df-val">0 Newton</span>
            </div>
            <p class="hc-df-note">Fd = 0.5 * ρ * v² * Cd * A</p>
        </div>
    </div>
    <?php
}
