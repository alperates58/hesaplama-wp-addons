<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bagil_standart_hata_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bagil-standart-hata-hesaplama',
        HC_PLUGIN_URL . 'modules/bagil-standart-hata-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bagil-standart-hata-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bagil-standart-hata-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rse-calc">
        <h3>Bağıl Standart Hata (RSE) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rse-mean">Ortalama (μ):</label>
            <input type="number" id="hc-rse-mean" class="hc-input" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-rse-sd">Standart Sapma (σ):</label>
            <input type="number" id="hc-rse-sd" class="hc-input" placeholder="Örn: 5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-rse-n">Gözlem Sayısı (n):</label>
            <input type="number" id="hc-rse-n" class="hc-input" placeholder="Örn: 100">
        </div>
        <button class="hc-btn" onclick="hcRSEHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bagil-standart-hata-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Standart Hata (SE):</span>
                    <strong id="hc-res-se-val">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Bağıl Standart Hata (RSE):</span>
                    <strong id="hc-res-rse-val">-</strong>
                </div>
            </div>
            <p style="margin-top:10px; font-size:0.85em; color:#666;">Formül: (SE / μ) * 100</p>
        </div>
    </div>
    <?php
}
