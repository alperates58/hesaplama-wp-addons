<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dalga_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dalga-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/dalga-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dalga-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dalga-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dalga-sayisi-hesaplama">
        <h3>Dalga Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ds-lambda">Dalga Boyu (λ - m)</label>
            <input type="number" id="hc-ds-lambda" placeholder="Örn: 0.5" step="any">
        </div>
        <button class="hc-btn" onclick="hcDSHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ds-result">
            <div class="hc-ds-grid">
                <div class="hc-ds-item">
                    <span class="hc-result-label">Açısal Dalga Sayısı (k):</span>
                    <span class="hc-result-value" id="hc-ds-angular">-</span>
                    <div class="hc-ds-unit">rad/m</div>
                </div>
                <div class="hc-ds-item">
                    <span class="hc-result-label">Spektroskopik Dalga Sayısı (ν̃):</span>
                    <span class="hc-result-value" id="hc-ds-spectro">-</span>
                    <div class="hc-ds-unit">m⁻¹</div>
                </div>
            </div>
            <div class="hc-result-note">k = 2π / λ | ν̃ = 1 / λ</div>
        </div>
    </div>
    <?php
}
