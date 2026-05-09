<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aktivasyon_enerjisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aktivasyon-enerjisi',
        HC_PLUGIN_URL . 'modules/aktivasyon-enerjisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aktivasyon-enerjisi-css',
        HC_PLUGIN_URL . 'modules/aktivasyon-enerjisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aktivasyon-enerjisi">
        <h3>Aktivasyon Enerjisi (Ea) Hesaplama</h3>
        <div class="hc-form-group">
            <label>1. Durum (T₁, k₁)</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-ae-t1" placeholder="T₁ (°C)" step="any">
                <input type="number" id="hc-ae-k1" placeholder="k₁" step="any">
            </div>
        </div>
        <div class="hc-form-group">
            <label>2. Durum (T₂, k₂)</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-ae-t2" placeholder="T₂ (°C)" step="any">
                <input type="number" id="hc-ae-k2" placeholder="k₂" step="any">
            </div>
        </div>
        <button class="hc-btn" onclick="hcAEHesapla()">Ea Hesapla</button>
        <div class="hc-result" id="hc-ae-result">
            <div class="hc-result-label">Aktivasyon Enerjisi (Ea):</div>
            <div class="hc-result-value" id="hc-ae-val">-</div>
            <div class="hc-result-note">R = 8.314 J/(mol·K)</div>
        </div>
    </div>
    <?php
}
