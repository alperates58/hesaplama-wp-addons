<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bagil_standart_sapma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bagil-standart-sapma-hesaplama',
        HC_PLUGIN_URL . 'modules/bagil-standart-sapma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bagil-standart-sapma-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bagil-standart-sapma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rsd-calc">
        <h3>Bağıl Standart Sapma (RSD/CV) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rsd-mean">Ortalama (μ):</label>
            <input type="number" id="hc-rsd-mean" class="hc-input" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-rsd-sd">Standart Sapma (σ):</label>
            <input type="number" id="hc-rsd-sd" class="hc-input" placeholder="Örn: 15" step="any">
        </div>
        <button class="hc-btn" onclick="hcRSDHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bagil-standart-sapma-hesaplama-result">
            <div class="hc-result-label">Bağıl Standart Sapma:</div>
            <div class="hc-result-value" id="hc-res-rsd-val">-</div>
            <p style="margin-top:10px; font-size:0.85em; color:#666;">Formül: (σ / μ) * 100</p>
        </div>
    </div>
    <?php
}
