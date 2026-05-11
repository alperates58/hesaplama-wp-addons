<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_asal_gerilme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stress-js',
        HC_PLUGIN_URL . 'modules/asal-gerilme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stress-css',
        HC_PLUGIN_URL . 'modules/asal-gerilme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stress">
        <h3>Asal Gerilme Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-st-sigx">Normal Gerilme x (σₓ)</label>
            <input type="number" id="hc-st-sigx" placeholder="MPa" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-st-sigy">Normal Gerilme y (σᵧ)</label>
            <input type="number" id="hc-st-sigy" placeholder="MPa" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-st-tauxy">Kayma Gerilmesi (τₓᵧ)</label>
            <input type="number" id="hc-st-tauxy" placeholder="MPa" step="0.1">
        </div>

        <button class="hc-btn" onclick="hcAsalGerilmeHesapla()">Gerilmeleri Hesapla</button>

        <div class="hc-result" id="hc-stress-result">
            <div class="hc-result-item">
                <span>Asal Gerilme 1 (σ₁):</span>
                <strong class="hc-result-value" id="hc-st-res-s1">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Asal Gerilme 2 (σ₂):</span>
                <strong class="hc-result-value" id="hc-st-res-s2">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Maksimum Kayma (τₘₐₓ):</span>
                <span id="hc-st-res-tmax">-</span>
            </div>
            <div class="hc-result-note" id="hc-st-res-note"></div>
        </div>
    </div>
    <?php
}
