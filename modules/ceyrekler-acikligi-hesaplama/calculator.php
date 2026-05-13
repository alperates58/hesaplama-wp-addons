<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ceyrekler_acikligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ceyrekler-acikligi-hesaplama',
        HC_PLUGIN_URL . 'modules/ceyrekler-acikligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ceyrekler-acikligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ceyrekler-acikligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-iqr">
        <h3>Çeyrekler Açıklığı (IQR) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-iqr-data">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-iqr-data" class="hc-input" placeholder="Örn: 5, 10, 15, 20, 25, 30, 35"></textarea>
        </div>
        <button class="hc-btn" onclick="hcIQRHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ceyrekler-acikligi-hesaplama-result">
            <div class="hc-result-label">Çeyrekler Açıklığı (IQR):</div>
            <div class="hc-result-value" id="hc-res-iqr-val">-</div>
            <div class="hc-result-grid" style="margin-top: 15px;">
                <div class="hc-result-item">
                    <span>1. Çeyrek (Q1):</span>
                    <strong id="hc-res-iqr-q1">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>3. Çeyrek (Q3):</span>
                    <strong id="hc-res-iqr-q3">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
