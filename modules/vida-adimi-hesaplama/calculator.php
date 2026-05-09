<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vida_adimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-screw-pitch',
        HC_PLUGIN_URL . 'modules/vida-adimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-screw-pitch-css',
        HC_PLUGIN_URL . 'modules/vida-adimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-screw-pitch">
        <h3>Vida Adımı (Pitch) Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-sp-dist">Toplam Mesafe [mm]</label>
            <input type="number" id="hc-sp-dist" value="10" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-sp-threads">Diş Sayısı</label>
            <input type="number" id="hc-sp-threads" value="8" min="1">
        </div>
        <button class="hc-btn" onclick="hcScrewPitchHesapla()">Vida Adımını Hesapla</button>
        <div class="hc-result" id="hc-screw-pitch-result">
            <div class="hc-result-item">
                <span>Vida Adımı (P):</span>
                <span class="hc-result-value" id="hc-res-sp-val">0 mm</span>
            </div>
            <p class="hc-sp-note">Adım = Mesafe / Diş Sayısı</p>
        </div>
    </div>
    <?php
}
