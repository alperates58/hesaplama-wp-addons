<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_f_istatistigi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-f-istatistigi-hesaplama',
        HC_PLUGIN_URL . 'modules/f-istatistigi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-f-istatistigi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/f-istatistigi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-f-stat">
        <h3>F-İstatistiği (Varyans Oranı)</h3>
        <div class="hc-form-group">
            <label for="hc-f-s1">1. Grup Varyansı (S₁²):</label>
            <input type="number" id="hc-f-s1" class="hc-input" placeholder="Örn: 25" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-f-s2">2. Grup Varyansı (S₂²):</label>
            <input type="number" id="hc-f-s2" class="hc-input" placeholder="Örn: 10" step="any">
        </div>
        <button class="hc-btn" onclick="hcFStatHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-f-istatistigi-result">
            <div class="hc-result-label">F Değeri:</div>
            <div class="hc-result-value" id="hc-res-f-val">-</div>
            <p id="hc-f-desc" style="margin-top:10px; font-size:0.9em;"></p>
            <p style="margin-top:5px; font-size:0.8em; color:#666;">Formül: F = S₁² / S₂² (Büyük varyans paya yazılır)</p>
        </div>
    </div>
    <?php
}
