<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_compton_sacilmasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-compton-sacilmasi-hesaplama',
        HC_PLUGIN_URL . 'modules/compton-sacilmasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-compton-sacilmasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/compton-sacilmasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-compton-sacilmasi-hesaplama">
        <h3>Compton Saçılması Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cs-angle">Saçılma Açısı (θ - Derece)</label>
            <input type="number" id="hc-cs-angle" placeholder="Örn: 90" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cs-wave">Gelen Foton Dalga Boyu (λ - pm)</label>
            <input type="number" id="hc-cs-wave" placeholder="Opsiyonel" step="any">
        </div>
        <button class="hc-btn" onclick="hcCSHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cs-result">
            <div class="hc-cs-grid">
                <div class="hc-cs-item">
                    <span class="hc-result-label">Dalga Boyu Kayması (Δλ):</span>
                    <span class="hc-result-value" id="hc-cs-shift">-</span>
                </div>
                <div class="hc-cs-item" id="hc-cs-new-wave-group" style="display:none;">
                    <span class="hc-result-label">Yeni Dalga Boyu (λ'):</span>
                    <span class="hc-result-value" id="hc-cs-new-wave">-</span>
                </div>
            </div>
            <div class="hc-result-note">Δλ = λ_c * (1 - cosθ) | λ_c ≈ 2.426 pm</div>
        </div>
    </div>
    <?php
}
