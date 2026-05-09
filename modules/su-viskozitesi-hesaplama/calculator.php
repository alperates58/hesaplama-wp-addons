<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_viskozitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-water-visc',
        HC_PLUGIN_URL . 'modules/su-viskozitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-water-visc-css',
        HC_PLUGIN_URL . 'modules/su-viskozitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-water-visc">
        <h3>Su Viskozite Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-wv-temp">Sıcaklık (T) [°C]</label>
            <input type="number" id="hc-wv-temp" value="20" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcWaterViscHesapla()">Viskoziteyi Hesapla</button>
        <div class="hc-result" id="hc-water-visc-result">
            <div class="hc-result-item">
                <span>Dinamik Viskozite (μ):</span>
                <span class="hc-result-value" id="hc-res-wv-dyn">0 Pa.s</span>
            </div>
            <div class="hc-result-item">
                <span>Kinematik Viskozite (ν):</span>
                <span id="hc-res-wv-kin">0 m²/s</span>
            </div>
            <p class="hc-wv-note">Vogel denklemi ve IAPWS standartları baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
