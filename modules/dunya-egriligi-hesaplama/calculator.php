<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dunya_egriligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dunya-egriligi-hesaplama',
        HC_PLUGIN_URL . 'modules/dunya-egriligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dunya-egriligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dunya-egriligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dunya-egriligi-hesaplama">
        <h3>Dünya Eğriliği Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-degr-dist">Mesafe (d - km)</label>
            <input type="number" id="hc-degr-dist" placeholder="Örn: 10" step="any">
        </div>
        <button class="hc-btn" onclick="hcDEGRHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-degr-result">
            <div class="hc-result-label">Alçalma Miktarı:</div>
            <div class="hc-result-value" id="hc-degr-val">-</div>
            <div class="hc-result-note">R = 6.371 km baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
