<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_atis_hareketi_menzil_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-atis-hareketi-menzil-hesaplama',
        HC_PLUGIN_URL . 'modules/atis-hareketi-menzil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-atis-hareketi-menzil-hesaplama-css',
        HC_PLUGIN_URL . 'modules/atis-hareketi-menzil-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-atis-hareketi-menzil-hesaplama">
        <h3>Menzil (Yatay Mesafe) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ah-r-v0">İlk Hız (v₀ - m/s)</label>
            <input type="number" id="hc-ah-r-v0" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ah-r-angle">Fırlatma Açısı (θ - Derece)</label>
            <input type="number" id="hc-ah-r-angle" placeholder="Örn: 45" step="any">
        </div>
        <button class="hc-btn" onclick="hcAHRHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ah-r-result">
            <div class="hc-result-label">Yatay Menzil (R):</div>
            <div class="hc-result-value" id="hc-ah-r-val">-</div>
            <div class="hc-result-note">R = (v₀² * sin2θ) / g</div>
        </div>
    </div>
    <?php
}
