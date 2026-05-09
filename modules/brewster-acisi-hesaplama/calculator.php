<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_brewster_acisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-brewster-acisi-hesaplama',
        HC_PLUGIN_URL . 'modules/brewster-acisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-brewster-acisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/brewster-acisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-brewster-acisi-hesaplama">
        <h3>Brewster Açısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ba-n1">Birinci Ortam İndisi (n₁ - Örn: Hava=1)</label>
            <input type="number" id="hc-ba-n1" value="1.0" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ba-n2">İkinci Ortam İndisi (n₂ - Örn: Cam=1.5)</label>
            <input type="number" id="hc-ba-n2" placeholder="Örn: 1.5" step="any">
        </div>
        <button class="hc-btn" onclick="hcBAHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ba-result">
            <div class="hc-result-label">Brewster Açısı (θ_B):</div>
            <div class="hc-result-value" id="hc-ba-val">-</div>
            <div class="hc-result-note">θ_B = arctan(n₂ / n₁)</div>
        </div>
    </div>
    <?php
}
