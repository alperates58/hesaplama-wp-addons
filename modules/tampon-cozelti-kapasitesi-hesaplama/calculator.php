<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tampon_cozelti_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-buffer-cap',
        HC_PLUGIN_URL . 'modules/tampon-cozelti-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-buffer-cap-css',
        HC_PLUGIN_URL . 'modules/tampon-cozelti-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-buffer-cap">
        <h3>Tampon Kapasitesi (β)</h3>
        <div class="hc-form-group">
            <label for="hc-bc-acid">Zayıf Asit Konsantrasyonu [M]</label>
            <input type="number" id="hc-bc-acid" value="0.1" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-bc-salt">Konjuge Baz/Tuz Konsantrasyonu [M]</label>
            <input type="number" id="hc-bc-salt" value="0.1" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcBufferCapHesapla()">Kapasiteyi Hesapla</button>
        <div class="hc-result" id="hc-buffer-cap-result">
            <div class="hc-result-item">
                <span>Tampon Kapasitesi (β):</span>
                <span class="hc-result-value" id="hc-res-bc-val">0</span>
            </div>
            <p class="hc-bc-note">β = 2.303 * [ (Ca * Cb) / (Ca + Cb) ]</p>
        </div>
    </div>
    <?php
}
