<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_prandtl_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-prandtl',
        HC_PLUGIN_URL . 'modules/prandtl-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-prandtl">
        <h3>Prandtl Sayısı (Pr) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pr-cp">Öz Isı (Cp - J/kg·K)</label>
            <input type="number" id="hc-pr-cp" placeholder="J/kg·K" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-pr-mu">Dinamik Viskozite (μ - Pa·s)</label>
            <input type="number" id="hc-pr-mu" placeholder="Pa·s" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-pr-k">Isıl İletkenlik (k - W/m·K)</label>
            <input type="number" id="hc-pr-k" placeholder="W/m·K" step="any">
        </div>

        <button class="hc-btn" onclick="hcPrandtlHesapla()">Pr Hesapla</button>

        <div class="hc-result" id="hc-pr-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Prandtl Sayısı (Pr):</span>
                <span class="hc-result-value" id="hc-pr-res-total">--</span>
            </div>
        </div>
    </div>
    <?php
}
