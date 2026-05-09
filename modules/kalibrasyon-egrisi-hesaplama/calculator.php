<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kalibrasyon_egrisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kalibrasyon',
        HC_PLUGIN_URL . 'modules/kalibrasyon-egrisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kalibrasyon-css',
        HC_PLUGIN_URL . 'modules/kalibrasyon-egrisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kalibrasyon">
        <h3>Kalibrasyon Eğrisi (Derişim) Hesaplama</h3>
        <p style="font-size:0.9em; opacity:0.8;">İki standart nokta girerek eğimi belirleyin:</p>
        <div class="hc-form-group">
            <label>Standart 1 (Derişim - Sinyal)</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-ke-x1" placeholder="x₁" step="any">
                <input type="number" id="hc-ke-y1" placeholder="y₁" step="any">
            </div>
        </div>
        <div class="hc-form-group">
            <label>Standart 2 (Derişim - Sinyal)</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-ke-x2" placeholder="x₂" step="any">
                <input type="number" id="hc-ke-y2" placeholder="y₂" step="any">
            </div>
        </div>
        <hr style="border:0; border-top:1px solid rgba(255,255,255,0.1); margin:20px 0;">
        <div class="hc-form-group">
            <label for="hc-ke-y">Numune Sinyali (y)</label>
            <input type="number" id="hc-ke-y" placeholder="y" step="any">
        </div>
        <button class="hc-btn" onclick="hcKEHesapla()">Numune Derişimi Hesapla</button>
        <div class="hc-result" id="hc-ke-result">
            <div class="hc-result-label">Numune Derişimi (x):</div>
            <div class="hc-result-value" id="hc-ke-val">-</div>
            <div class="hc-result-note">y = mx + b (Doğrusal Regresyon)</div>
        </div>
    </div>
    <?php
}
