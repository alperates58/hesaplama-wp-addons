<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uzama_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-elongation',
        HC_PLUGIN_URL . 'modules/uzama-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-elongation-css',
        HC_PLUGIN_URL . 'modules/uzama-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-elongation">
        <h3>Uzama Yüzdesi (% Elongation)</h3>
        <div class="hc-form-group">
            <label for="hc-uo-l0">Başlangıç Boyu (L0) [mm]</label>
            <input type="number" id="hc-uo-l0" value="100" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-uo-lf">Son Boy (Lf) [mm]</label>
            <input type="number" id="hc-uo-lf" value="112" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcElongationHesapla()">Uzamayı Hesapla</button>
        <div class="hc-result" id="hc-elongation-result">
            <div class="hc-result-item">
                <span>Uzama Oranı:</span>
                <span class="hc-result-value" id="hc-res-uo-val">%0</span>
            </div>
            <p class="hc-uo-note">%Uzama = [(Lf - L0) / L0] * 100</p>
        </div>
    </div>
    <?php
}
