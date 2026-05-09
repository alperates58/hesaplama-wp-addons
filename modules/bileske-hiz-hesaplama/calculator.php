<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bileske_hiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bileske-hiz-hesaplama',
        HC_PLUGIN_URL . 'modules/bileske-hiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bileske-hiz-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bileske-hiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bileske-hiz-hesaplama">
        <h3>Bileşke Hız Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bh-v1">Birinci Hız (v₁ - m/s)</label>
            <input type="number" id="hc-bh-v1" placeholder="Örn: 3" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bh-v2">İkinci Hız (v₂ - m/s)</label>
            <input type="number" id="hc-bh-v2" placeholder="Örn: 4" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bh-angle">Aralarındaki Açı (θ - Derece)</label>
            <input type="number" id="hc-bh-angle" placeholder="Örn: 90" value="90" step="any">
        </div>
        <button class="hc-btn" onclick="hcBHHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bh-result">
            <div class="hc-result-label">Bileşke Hız (V):</div>
            <div class="hc-result-value" id="hc-bh-val">-</div>
            <div class="hc-result-note">V = √(v₁² + v₂² + 2v₁v₂cosθ)</div>
        </div>
    </div>
    <?php
}
