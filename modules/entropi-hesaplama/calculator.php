<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_entropi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-entropi',
        HC_PLUGIN_URL . 'modules/entropi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-entropi-css',
        HC_PLUGIN_URL . 'modules/entropi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-entropi">
        <h3>Entropi Değişimi (ΔS) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-s-q">Isı Değişimi (Q - Joule)</label>
            <input type="number" id="hc-s-q" placeholder="Örn: 500" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-s-t">Sıcaklık (T - °C)</label>
            <input type="number" id="hc-s-t" placeholder="Örn: 25" step="any">
        </div>
        <button class="hc-btn" onclick="hcEntropiHesapla()">ΔS Hesapla</button>
        <div class="hc-result" id="hc-s-result">
            <div class="hc-result-label">Entropi Değişimi (ΔS):</div>
            <div class="hc-result-value" id="hc-s-val">-</div>
            <div class="hc-result-note">Formül: ΔS = Q / T (Kelvin)</div>
        </div>
    </div>
    <?php
}
