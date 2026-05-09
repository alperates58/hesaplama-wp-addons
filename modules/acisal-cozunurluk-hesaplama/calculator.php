<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_acisal_cozunurluk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-acisal-cozunurluk-hesaplama',
        HC_PLUGIN_URL . 'modules/acisal-cozunurluk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-acisal-cozunurluk-hesaplama-css',
        HC_PLUGIN_URL . 'modules/acisal-cozunurluk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-acisal-cozunurluk-hesaplama">
        <h3>Açısal Çözünürlük Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ac-wave">Dalga Boyu (λ - nm)</label>
            <input type="number" id="hc-ac-wave" placeholder="Örn: 550" value="550">
        </div>
        <div class="hc-form-group">
            <label for="hc-ac-diam">Açıklık Çapı (D - mm)</label>
            <input type="number" id="hc-ac-diam" placeholder="Örn: 100" value="100">
        </div>
        <button class="hc-btn" onclick="hcACHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ac-result">
            <div class="hc-result-label">Açısal Çözünürlük (θ):</div>
            <div class="hc-result-value" id="hc-ac-val">-</div>
            <div class="hc-result-note">Rayleigh Kriteri: θ = 1.22 * λ / D</div>
        </div>
    </div>
    <?php
}
