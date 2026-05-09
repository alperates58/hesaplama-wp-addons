<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_varyasyon_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coeff-var',
        HC_PLUGIN_URL . 'modules/varyasyon-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-coeff-var-css',
        HC_PLUGIN_URL . 'modules/varyasyon-katsayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-coeff-var">
        <h3>Varyasyon Katsayısı (CV)</h3>
        <div class="hc-form-group">
            <label for="hc-cv-mean">Ortalama (μ)</label>
            <input type="number" id="hc-cv-mean" value="100" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-cv-std">Standart Sapma (σ)</label>
            <input type="number" id="hc-cv-std" value="15" step="0.01" min="0">
        </div>
        <button class="hc-btn" onclick="hcCoeffVarHesapla()">CV Hesapla</button>
        <div class="hc-result" id="hc-coeff-var-result">
            <div class="hc-result-item">
                <span>Varyasyon Katsayısı:</span>
                <span class="hc-result-value" id="hc-res-cv-val">%0</span>
            </div>
            <p class="hc-cv-note">Formül: (Standart Sapma / Ortalama) x 100. %30'dan büyük değerler yüksek değişkenliği gösterir.</p>
        </div>
    </div>
    <?php
}
