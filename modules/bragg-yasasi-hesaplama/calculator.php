<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bragg_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bragg-yasasi-hesaplama',
        HC_PLUGIN_URL . 'modules/bragg-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bragg-yasasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bragg-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bragg-yasasi-hesaplama">
        <h3>Bragg Yasası Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-by-n">Kırınım Mertebesi (n)</label>
            <input type="number" id="hc-by-n" value="1" min="1" step="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-by-d">Düzlemler Arası Mesafe (d - Å)</label>
            <input type="number" id="hc-by-d" placeholder="Örn: 2.82" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-by-angle">Geliş Açısı (θ - Derece)</label>
            <input type="number" id="hc-by-angle" placeholder="Örn: 15" step="any">
        </div>
        <button class="hc-btn" onclick="hcBYHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-by-result">
            <div class="hc-result-label">Dalga Boyu (λ):</div>
            <div class="hc-result-value" id="hc-by-val">-</div>
            <div class="hc-result-note">n * λ = 2 * d * sinθ</div>
        </div>
    </div>
    <?php
}
