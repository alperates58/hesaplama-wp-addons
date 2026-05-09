<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_donme_rijitligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-donme-rijitligi-hesaplama',
        HC_PLUGIN_URL . 'modules/donme-rijitligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-donme-rijitligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/donme-rijitligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-donme-rijitligi-hesaplama">
        <h3>Dönme Rijitliği (Torsional Stiffness)</h3>
        <div class="hc-form-group">
            <label for="hc-dr-g">Kayma Modülü (G - GPa)</label>
            <input type="number" id="hc-dr-g" placeholder="Örn: 80 (Çelik)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dr-d">Mil Çapı (d - mm)</label>
            <input type="number" id="hc-dr-d" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dr-l">Mil Uzunluğu (L - m)</label>
            <input type="number" id="hc-dr-l" placeholder="Örn: 2" step="any">
        </div>
        <button class="hc-btn" onclick="hcDRHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dr-result">
            <div class="hc-result-label">Dönme Rijitliği (k_t):</div>
            <div class="hc-result-value" id="hc-dr-val">-</div>
            <div class="hc-result-note">k_t = (G * J) / L | J = (π * d⁴) / 32</div>
        </div>
    </div>
    <?php
}
