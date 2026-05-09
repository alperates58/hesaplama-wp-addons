<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_debye_uzunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-debye-uzunlugu-hesaplama',
        HC_PLUGIN_URL . 'modules/debye-uzunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-debye-uzunlugu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/debye-uzunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-debye-uzunlugu-hesaplama">
        <h3>Debye Uzunluğu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-du-te">Elektron Sıcaklığı (T_e - K)</label>
            <input type="number" id="hc-du-te" placeholder="Örn: 10000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-du-ne">Elektron Yoğunluğu (n_e - m⁻³)</label>
            <input type="number" id="hc-du-ne" placeholder="Örn: 1e18" step="any">
        </div>
        <button class="hc-btn" onclick="hcDUHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-du-result">
            <div class="hc-result-label">Debye Uzunluğu (λ_D):</div>
            <div class="hc-result-value" id="hc-du-val">-</div>
            <div class="hc-result-note">λ_D = √((ε₀ * k_B * T_e) / (n_e * e²))</div>
        </div>
    </div>
    <?php
}
