<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hipotez_testi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hipotez-testi-hesaplama',
        HC_PLUGIN_URL . 'modules/hipotez-testi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hipotez-testi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hipotez-testi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hipotez-testi">
        <h3>Hipotez Testi (Z-Testi) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hypo-mu0">Hipotez Edilen Ortalama (μ₀):</label>
            <input type="number" id="hc-hypo-mu0" class="hc-input" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-hypo-x">Örneklem Ortalaması (x̄):</label>
            <input type="number" id="hc-hypo-x" class="hc-input" placeholder="Örn: 105" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-hypo-sigma">Popülasyon Standart Sapması (σ):</label>
            <input type="number" id="hc-hypo-sigma" class="hc-input" placeholder="Örn: 15" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-hypo-n">Örneklem Boyutu (n):</label>
            <input type="number" id="hc-hypo-n" class="hc-input" placeholder="Örn: 50">
        </div>
        <button class="hc-btn" onclick="hcHipotezTestiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hipotez-testi-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Z-Skoru:</span>
                    <strong id="hc-res-hypo-z">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>P-Değeri (Çift Kuyruk):</span>
                    <strong id="hc-res-hypo-p">-</strong>
                </div>
            </div>
            <div id="hc-hypo-desc" style="margin-top:15px; font-weight: bold;"></div>
        </div>
    </div>
    <?php
}
