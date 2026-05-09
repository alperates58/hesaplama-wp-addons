<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_basit_sarkac_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-basit-sarkac-hesaplama',
        HC_PLUGIN_URL . 'modules/basit-sarkac-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-basit-sarkac-hesaplama-css',
        HC_PLUGIN_URL . 'modules/basit-sarkac-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-basit-sarkac-hesaplama">
        <h3>Basit Sarkaç Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bs-len">İp Uzunluğu (L - m)</label>
            <input type="number" id="hc-bs-len" placeholder="Örn: 1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bs-g">Yerçekimi İvmesi (g - m/s²)</label>
            <input type="number" id="hc-bs-g" value="9.80665" step="any">
        </div>
        <button class="hc-btn" onclick="hcBSHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bs-result">
            <div class="hc-result-label">Salınım Periyodu (T):</div>
            <div class="hc-result-value" id="hc-bs-val">-</div>
            <div class="hc-result-note">T = 2π * √(L/g)</div>
        </div>
    </div>
    <?php
}
