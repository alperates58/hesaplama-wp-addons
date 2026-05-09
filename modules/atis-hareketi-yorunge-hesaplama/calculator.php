<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_atis_hareketi_yorunge_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-atis-hareketi-yorunge-hesaplama',
        HC_PLUGIN_URL . 'modules/atis-hareketi-yorunge-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-atis-hareketi-yorunge-hesaplama-css',
        HC_PLUGIN_URL . 'modules/atis-hareketi-yorunge-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-atis-hareketi-yorunge-hesaplama">
        <h3>Yörünge Denklemi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ah-y-v0">İlk Hız (v₀ - m/s)</label>
            <input type="number" id="hc-ah-y-v0" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ah-y-angle">Fırlatma Açısı (θ - Derece)</label>
            <input type="number" id="hc-ah-y-angle" placeholder="Örn: 45" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ah-y-x">Yatay Mesafe (x - m)</label>
            <input type="number" id="hc-ah-y-x" placeholder="Örn: 100" step="any">
        </div>
        <button class="hc-btn" onclick="hcAHYHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ah-y-result">
            <div class="hc-result-label">Dikey Konum (y):</div>
            <div class="hc-result-value" id="hc-ah-y-val">-</div>
            <div class="hc-result-note">y = x·tanθ - (g·x²) / (2·v₀²·cos²θ)</div>
        </div>
    </div>
    <?php
}
