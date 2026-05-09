<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ust_kontrol_limiti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ucl-calc',
        HC_PLUGIN_URL . 'modules/ust-kontrol-limiti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ucl-calc-css',
        HC_PLUGIN_URL . 'modules/ust-kontrol-limiti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ucl-calc">
        <h3>Üst Kontrol Limiti (UCL)</h3>
        <div class="hc-form-group">
            <label for="hc-uc-mean">Ortalama Değer (μ)</label>
            <input type="number" id="hc-uc-mean" value="100" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-uc-std">Standart Sapma (σ)</label>
            <input type="number" id="hc-uc-std" value="5" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-uc-sigma">Sigma Seviyesi (Genellikle 3)</label>
            <input type="number" id="hc-uc-sigma" value="3" min="1" max="6">
        </div>
        <button class="hc-btn" onclick="hcUCLHesapla()">Limiti Hesapla</button>
        <div class="hc-result" id="hc-ucl-calc-result">
            <div class="hc-result-item">
                <span>Üst Kontrol Limiti (UCL):</span>
                <span class="hc-result-value" id="hc-res-uc-val">0</span>
            </div>
            <p class="hc-uc-note">UCL = Ortalama + (Sigma * Standart Sapma)</p>
        </div>
    </div>
    <?php
}
