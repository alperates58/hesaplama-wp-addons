<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_stall_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stall-speed',
        HC_PLUGIN_URL . 'modules/stall-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stall-speed-css',
        HC_PLUGIN_URL . 'modules/stall-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stall-speed">
        <h3>Stall Hızı (Vs) Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-ss-w">Ağırlık (W) [kg]</label>
            <input type="number" id="hc-ss-w" value="1200">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-rho">Hava Yoğunluğu (ρ) [kg/m³]</label>
            <input type="number" id="hc-ss-rho" value="1.225">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-s">Kanat Alanı (S) [m²]</label>
            <input type="number" id="hc-ss-s" value="16">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-cl">Maks. Taşıma Katsayısı (Cl-max)</label>
            <input type="number" id="hc-ss-cl" value="1.5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcStallSpeedHesapla()">Hızı Hesapla</button>
        <div class="hc-result" id="hc-stall-speed-result">
            <div class="hc-result-item">
                <span>Stall Hızı:</span>
                <span class="hc-result-value" id="hc-res-ss-val">0 km/s</span>
            </div>
            <p class="hc-ss-note">Vs = sqrt( (2 * W * g) / (ρ * S * Cl) )</p>
        </div>
    </div>
    <?php
}
